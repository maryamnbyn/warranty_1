<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $guarded = [];
    protected $appends = ['image_url'];

    public function storeProduct($pic)
    {
        if (!empty(request()->file('image'))) {
            $get_full_name_pic = $pic->getClientOriginalName();
            $get_path_pic = $pic->storeAs('upload', $get_full_name_pic, 'asset');
            $ProductPic = pathinfo($get_path_pic, PATHINFO_BASENAME);

            $this->update([
                'image' => $ProductPic
            ]);
        }
    }

    public function updateProduct($pic)
    {
        if(!empty(request()->file('image')))
        {
            if(!empty($this->image)){
                unlink('picture/upload/' . $this->image);

                $get_full_name_pic = $pic->getClientOriginalName();
                $get_path_pic = $pic->storeAs('upload', $get_full_name_pic, 'asset');
                $ProductPic = pathinfo($get_path_pic, PATHINFO_BASENAME);

                $this->update([
                    'image' => $ProductPic
                ]);
            }
            else{
                $get_full_name_pic = $pic->getClientOriginalName();
                $get_path_pic = $pic->storeAs('upload', $get_full_name_pic, 'asset');
                $ProductPic = pathinfo($get_path_pic, PATHINFO_BASENAME);

                $this->update([
                    'image' => $ProductPic
                ]);
            }
        }
    }

    public function deleteProduct()
    {
        if ($this->image != null) {
            unlink('picture/upload/' . $this->image);

            $this->delete();

        } else {
            $this->delete();
        }

    }

    public function getImageUrlAttribute()
    {
        if(!empty($this->image)){
            $url = URL('') . "/api/v1/download/$this->image";
            return $url;
        }else
        {
            return null;
        }

    }
}
