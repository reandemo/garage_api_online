<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LogActivity;
use DateTime;

use App\Models\User as User;


use App\Models\BranchStore as Branch;

class SqlModel extends Model
{
    //

    use HasFactory, Notifiable;

    public function generateBranchCode()
    {

        $lastBranch = Branch::orderByDesc('branchcode')->first();
        if (!$lastBranch) {

            return 'B001';
        }

        $number = (int) substr($lastBranch->branchcode, 2);

        return 'B' . str_pad($number + 1, 3, '0', STR_PAD_LEFT);
    }
    public function generateUserId()
    {
        $lastUser = User::orderBy('id', 'desc')->first();

        if (!$lastUser) {

            return 'USR0001';
        }

        $number = (int) substr($lastUser->user_id, 3);

        return 'USR' . str_pad(

            $number + 1,

            4,

            '0',

            STR_PAD_LEFT

        );
    }



    public function fun_num_rand()
    {
        $date   = new DateTime(); //this returns the current date time
        $result = $date->format('Y-m-d-H-i-s');
        $result = implode("", explode('-', $result));
        return  $result;
    }

    public function getCurrentUser()
    {
        return Auth::user();
    }
    public function getCurrentBranch()

    {

        $user = $this->getCurrentUser();


        if (!$user) {

            return null;
        }

        return DB::table('tbl_branches')

            ->where('branch_code', $user->branch_code)

            ->first();
    }
    public function gb_user_system()
    {
        $branch = $this->getCurrentBranch();

        return $branch?->system_id;
    }

    public function gb_user_subofbranch()
    {
        $branch = $this->getCurrentBranch();
        return $branch?->subofbranch;
    }
    public function gb_user_branch()
    {
        return Auth::user()?->branch_code;
    }
    public function gb_user_email()
    {
        return Auth::user()?->email;
    }

    public function proc_get_data($procedure, array $sql)
    {
        $data = DB::select($procedure, $sql);
        return $data;
    }


    public function getUserContext()
    {
        $user = auth()->user();

        if (!$user) {
            throw new \Exception('User not authenticated.');
        }

        $branch = DB::table('tbl_branches')
            ->where('branch_code', $user->branch_code)
            ->first();

        return [
            'email'        => $user->email,
            'branch_code'  => $user->branch_code,
            'subofbranch'  => $branch?->subofbranch,
            'system_id'    => $branch?->system_id
        ];
    }


    public function arr_str($arr)
    {
        $str = 'History ';
        foreach ($arr as $key => $value) {
            if (empty($value)) {
                $value = ' Empty';
            }
            $str = $str . (string)$key . '=>' . $value . ',';
        }
        return $str;
    }
}
