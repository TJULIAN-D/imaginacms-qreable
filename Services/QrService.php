<?php


namespace Modules\Qreable\Services;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrService
{
    public function __construct()
    {

    }

    public function addQr($model, $codes){
        $entityClass = get_class($model);
        if(is_array($codes)){
            foreach ($codes as $code) {
                $qrCode = $this->generateQrCode($code);
                $qr = Qr::where('code',$qrCode);
                if($qr==null)
                    $qr = new QrCode(['code' => $code]);
                if ($qr->exists === false) {
                    $qr->save();
                }
                if ($qr->qreables($entityClass)->contains($model->id) === false) {
                    $qr->qreables($entityClass)->attach($model);
                }
            }
        }else {
            $qrCode = $this->generateQrCode($codes);
            $qr = Qr::where('code',$qrCode);
            if($qr==null)
                $qr = new QrCode(['code' => $qrCode]);
            if ($qr->exists === false) {
                $qr->save();
            }
            if ($qr->qreables($entityClass)->contains($model->id) === false) {
                $qr->qreables($entityClass)->attach($model);
            }
        }
    }

    public function generateQrCode($code){
        $qrCode = QrCode::format('png')->size(1024)->color(0,100,177)->generate($code);
        return 'data:image/png;base64,'.base64_encode($qrCode);
    }
}
