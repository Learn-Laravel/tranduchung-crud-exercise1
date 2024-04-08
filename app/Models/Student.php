<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    public $timestamps = false;
    public function getAllStudent(){
        $students = DB::table('students')->get();
        return $students;
    }
    public function addStudent($data){
        return DB::table('students')->insert($data);
    }
    public function getDetail($id)
    {
        return DB::select('SELECT * FROM ' . $this->table . ' WHERE id = ?', [$id]);
    }
    public function updateStudent($data, $id)
    {
        return DB::table($this ->table) -> where('id',$id) ->update($data);
    }
    public function deleteStudent($id)
    {
        return DB::table($this->table)->where('id', $id)->delete();
    }
}
