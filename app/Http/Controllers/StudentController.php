<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->students = new Student;
    }
    private $students;
    public function index()
    {
        
        $students = $this->students->getAllStudent();
        return view('index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataInsert = [
            'name' => $request->name,
            'phone' => $request->phone, 
        ];
        $studentModel = new Student;
        $studentCreate = $studentModel->addStudent($dataInsert);
        return redirect()->route('index')->with('msg', "Them sinh vien thanh cong");
    }
    /**
     * Display the specified resource.
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,$id = 0)
    {
        if (!empty($id)) {
            $studentDetail = $this->students->getDetail($id);
            // dd($studentDetail);
            if (!empty($studentDetail[0])) {
                $request->session()->put('id',$id);
                $studentDetail = $studentDetail[0];
            } else {
                return redirect()->route('index')->with('msg', 'Nguoi dung khong ton tai');
            }
        } else {
            return redirect()->route('index')->with('msg', 'Nguoi dung khong ton tai');
        }
        return view('edit', compact('studentDetail'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = session('id');
        if (empty($id)){
            return back()->with('msg', 'Lien ket khong ton tai');
        }
        $dataUpdate = [
            'name' => $request->name,
            'phone' => $request->phone, 
        ];
        $this->students->updateStudent($dataUpdate, $id);
        return redirect()->route('index', ['id' => $id])->with('msg', 'cap nhat sinh vien thanh cong');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function delete($id=0){
        if (!empty($id)) {
            $studentDetail = $this->students->getDetail($id);
            if (!empty($studentDetail[0])) {
                $deleteStatus = $this->students->deleteStudent($id);
                if ($deleteStatus){
                    $msg = 'Xoa nguoi dung thanh cong';
                } else{
                    $msg ='ban khong the xoa nguoi dung luc nay. VUi long thu lai';
                }
            }else{
                $msg ='Người dùng không tồn tại';
            }
        } else {
            $msg = 'Liên kết không tồn tại';
        }

        return redirect()->route('index')->with('msg', $msg);
    }
}
