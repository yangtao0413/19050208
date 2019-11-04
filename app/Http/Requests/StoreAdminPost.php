<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|alpha_dash|max:12|min:2|unique:admin',
            'pwd' => 'required|alpha_num|digits_between:6,12',
            'repwd'=>'same:pwd',
            'email'=>'required|email',
            'tel'=>'required',
            'head'=>'image',
            
        ];
    }


        public function messages(){
            return [
                'name.required'=>'管理员名称不能为空！',
                'name.alpha_dash'=>'管理员名称由字母 数字，以及破折号和下划线组成',
                'name.min'=>'管理员名称最少2位',
                'name.max'=>'管理员名称最多12位',
                'name.unique'=>'用户名已有人使用',
                'email.required'=>'邮箱不能为空',
                'email.email'=>'格式必须为邮箱',
                'tel.required'=>'电话不能为空',
                'pwd.required'=>'密码不能为空！',
                'pwd.alpha_dash'=>'密码名称由字母 数字，以及破折号和下划线组成',
                'pwd.digits_between'=>'密码需由6-12位组成',
                'repwd.same'=>'密码必须保持一致',
                'head.image'=>'头像必须为图片',

            ];
        }
}

