<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfert extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function universites()
    {
        return $this->belongsTo(Universite::class);
    }
    public function ScopeUploads($q)
    {
        return $q->where('type',1);
    }
    public function ScopeDownloads($q)
    {
        return $q->where('type',0);
    }
    public function getLinkFancyAttribute() {
        $type_doc_url = $this->fileName ?? null;
        $type_doc_url_file_path = public_path($type_doc_url);
        $iframe = $this->is_image_or_pdf ? '' : 'data-type="iframe"';
        $ext = explode('.', $this->fileName);
        $icon = 'fa-file text-dark';
        if($ext[1] == "pdf") $icon = 'fa-file-pdf';
        if(in_array($ext[1],['xlsx','xls','csv'])) $icon = 'fa-file-excel text-info';
        $classPiece = strtolower($this->name) == "fiche récapitulative" ? "bg-primary text-white" : "text-white";

        $msg = '<div class="col-4 col-lg-2"><a data-fancybox="'.$this->fileName.'"
                    data-caption="'.$this->fileName.'"
                    href="'.asset($this->fileName).'"
                    '.$iframe.'
                    class="d-inline-block'.$classPiece.'" >';
        if($type_doc_url && file_exists($type_doc_url_file_path)) {
            $msg .= '<div class="bg-white p-2">
                        <button class="btn btn-outline-primary btn-block">
                            <i class="fas '.$icon.' " style="font-size: 26px"></i> <br>
                            <span> '.$this->libelle.'</span> <br>
                            <span> Created at <br>'.$this->created_at->format('d-m-Y').'</span>
                        </button>
                    </div>';
        } else {
            $msg .= strtolower($this->name) == "fiche récapitulative" ? '<i class="fa fa-file-invoice fa-2x" aria-hidden="true"></i>' : '<i class="fa fa-paperclip fa-2x" aria-hidden="true"></i>';
        }
        $msg .= "<br><small class='small'>{$this->name}</small>";
        $msg.='</div></a>';

        return $msg;
    }
}
