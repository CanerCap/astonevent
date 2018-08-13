<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Event extends Model
{


    use Sortable;




    public $sortable = ['id', 'name', 'date', 'type', 'created_at', 'updated_at'];


}
