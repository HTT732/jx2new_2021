<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
        $rules = [];
        $rules['server'] = 'required';
        $rules['tieude'] = 'required|min:10|max:255';
        $rules['noidung'] = 'required|min:20|max:5000';
        $rules['kieugia'] = ['regex:/^vang|vnd|xu|khac$/i'];
        $rules['gia'] = ['required','regex:/^[1-9][0-9]{0,7}$|^Giao lưu$|^Thỏa thuận$/i'];

        $sdt = $this->input('sdt');
        $fb = $this->input('fb');

        if (!empty($sdt))
            $rules['sdt'] = ['regex:/^[0-9][1-9][0-9]{8,9}$/i'];
        if (!empty($fb))
            $rules['fb'] = 'required|min:6|max:255';


        for ($i = 0, $len = count($this->input()); $i < $len; $i++){
            $rules['image_'.$i] = 'mimes:jpeg,jpg,png,gif|max:2048';
        }

        return $rules;
    }

    public function messages()
    {
        $mess = [];
        $mess['server.required'] = 'Chưa chọn server';
        $mess['tieude.required'] = 'Chưa nhập tiêu đề';
        $mess['tieude.min'] = 'Tiêu đề quá ngắn';
        $mess['tieude.max'] = 'Tiêu đề vượt quá độ dài cho phép';
        $mess['noidung.required'] = 'Chưa nhập nội dung';
        $mess['noidung.min'] = 'Nội dung quá ngắn';
        $mess['noidung.max'] = 'Nội dung vượt quá độ dài cho phép';

        if ($this->input('file') != null) {
            for ($i = 0, $len = count($this->input()); $i < $len; $i++){
                $mess['image_'.$i.'.mimes'] = 'Tệp <u>'.$this->input('image_'.$i)->getClientOriginalName().'</u>' .' có định dạng không hợp lệ';
                $mess['image_'.$i.'.max'] = 'Tệp <u>'.$this->input('image_'.$i)->getClientOriginalName().'</u>' .' vượt quá kích thước cho phép (tối đa 2MB)';
            }
        } else {
            $mess['image.required'] = 'Chua chon hinh anh';
        }
        

        $mess['kieugia.regex'] = 'Kiểu giá mặc định: Vàng, Xu, VNĐ, ...';
        $mess['gia.required'] = 'Chưa định giá cho sản phẩm';
        $mess['gia.regex'] = 'Giá phải lớn hơn 0 và nhỏ hơn 99999999';
        // if (!empty($sdt))
            $mess['sdt.regex'] = 'Số điện thoại không hợp lệ';
        // if (!empty($fb)){
            $mess['fb.min'] = 'Độ dài link facebook không hợp lệ';
            $mess['fb.required'] = 'Chưa nhập link facebook';
            $mess['fb.max'] = 'Độ dài link facebook không hợp lệ';
        // }

        return $mess;
    }
}
