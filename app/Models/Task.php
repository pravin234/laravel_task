<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{
    use HasFactory;
    protected $fillable =['title','description','due_date','status'];
    protected $casts = ['due_date' => 'datetime'];
    public function getData($input,$download = false){
        $query = $this;
        if(isset($input['title']) && !empty($input['title'])){
            $query = $query->where(function($q) use($input){
                $q->where('name','like','%'.$input['name'].'%');
            });
        }
        if(isset($input['status']) && !empty($input['status'])){
            $query = $query->where('status',$input['status']);
        }
        if(isset($input['start_date']) && !empty($input['end_date']) && isset($input['start_date']) && !empty($input['end_date'])){

            $start_date = Carbon::parse($input['start_date'])->toDateTimeString();
            $end_date = Carbon::parse($input['end_date'])->toDateTimeString();

            $query = $query->whereBetween('due_date',[$start_date,$end_date]);
        }

        return $query->orderBy('id','desc')->paginate(10);

    }

    public function saveData($input){
        return $this->create($input);
    }
    public function updateData($input,$id){
        return $this->find($id)->update($input);
    }
}


