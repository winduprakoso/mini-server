<?php

namespace App\Http\Controllers;

use App\Models\Outprod;
use Idev\EasyAdmin\app\Http\Controllers\DefaultController;

class OutprodController extends DefaultController
{
    protected $modelClass = Outprod::class;
    protected $title;
    protected $generalUri;
    protected $tableHeaders;
    // protected $actionButtons;
    // protected $arrPermissions;
    protected $importExcelConfig;

    public function __construct()
    {
        $this->title = 'Outprod';
        $this->generalUri = 'outprod';
        // $this->arrPermissions = [];
        $this->actionButtons = ['btn_edit', 'btn_show', 'btn_delete'];

        $this->tableHeaders = [
                    ['name' => 'No', 'column' => '#', 'order' => true],
                    ['name' => 'Line no', 'column' => 'line_no', 'order' => true],
                    ['name' => 'Carline', 'column' => 'carline', 'order' => true],
                    ['name' => 'Id cust', 'column' => 'id_cust', 'order' => true],
                    ['name' => 'Id cv', 'column' => 'id_cv', 'order' => true],
                    ['name' => 'Cv', 'column' => 'cv', 'order' => true],
                    ['name' => 'Cv loding', 'column' => 'cv_loding', 'order' => true],
                    ['name' => 'Assy no', 'column' => 'assy_no', 'order' => true],
                    ['name' => 'Std box', 'column' => 'std_box', 'order' => true],
                    ['name' => 'Nik', 'column' => 'nik', 'order' => true],
                    ['name' => 'Pic prd', 'column' => 'pic_prd', 'order' => true],
                    ['name' => 'Tgl prd', 'column' => 'tgl_prd', 'order' => true],
                    ['name' => 'Shift', 'column' => 'shift', 'order' => true],
                    ['name' => 'Pm', 'column' => 'pm', 'order' => true],
                    ['name' => 'Waktu', 'column' => 'waktu', 'order' => true],
                    ['name' => 'Serial np', 'column' => 'serial_np', 'order' => true],
                    ['name' => 'Barcode np', 'column' => 'barcode_np', 'order' => true],
                    ['name' => 'Serial box', 'column' => 'serial_box', 'order' => true],
                    ['name' => 'Barcode box', 'column' => 'barcode_box', 'order' => true],
                    ['name' => 'Gelombang', 'column' => 'gelombang', 'order' => true],
                    ['name' => 'Pic prn', 'column' => 'pic_prn', 'order' => true],
                    ['name' => 'Tgl prn', 'column' => 'tgl_prn', 'order' => true],
                    ['name' => 'Pic ver', 'column' => 'pic_ver', 'order' => true],
                    ['name' => 'Tgl ver', 'column' => 'tgl_ver', 'order' => true],
                    ['name' => 'Item ver', 'column' => 'item_ver', 'order' => true],
                    ['name' => 'Barcode awal', 'column' => 'barcode_awal', 'order' => true],
                    ['name' => 'Barcode kbn', 'column' => 'barcode_kbn', 'order' => true], 
                    ['name' => 'Created at', 'column' => 'created_at', 'order' => true],
                    ['name' => 'Updated at', 'column' => 'updated_at', 'order' => true],
        ];


        $this->importExcelConfig = [ 
            'primaryKeys' => ['line_no'],
            'headers' => [
                    ['name' => 'Line no', 'column' => 'line_no'],
                    ['name' => 'Carline', 'column' => 'carline'],
                    ['name' => 'Id cust', 'column' => 'id_cust'],
                    ['name' => 'Id cv', 'column' => 'id_cv'],
                    ['name' => 'Cv', 'column' => 'cv'],
                    ['name' => 'Cv loding', 'column' => 'cv_loding'],
                    ['name' => 'Assy no', 'column' => 'assy_no'],
                    ['name' => 'Std box', 'column' => 'std_box'],
                    ['name' => 'Nik', 'column' => 'nik'],
                    ['name' => 'Pic prd', 'column' => 'pic_prd'],
                    ['name' => 'Tgl prd', 'column' => 'tgl_prd'],
                    ['name' => 'Shift', 'column' => 'shift'],
                    ['name' => 'Pm', 'column' => 'pm'],
                    ['name' => 'Waktu', 'column' => 'waktu'],
                    ['name' => 'Serial np', 'column' => 'serial_np'],
                    ['name' => 'Barcode np', 'column' => 'barcode_np'],
                    ['name' => 'Serial box', 'column' => 'serial_box'],
                    ['name' => 'Barcode box', 'column' => 'barcode_box'],
                    ['name' => 'Gelombang', 'column' => 'gelombang'],
                    ['name' => 'Pic prn', 'column' => 'pic_prn'],
                    ['name' => 'Tgl prn', 'column' => 'tgl_prn'],
                    ['name' => 'Pic ver', 'column' => 'pic_ver'],
                    ['name' => 'Tgl ver', 'column' => 'tgl_ver'],
                    ['name' => 'Item ver', 'column' => 'item_ver'],
                    ['name' => 'Barcode awal', 'column' => 'barcode_awal'],
                    ['name' => 'Barcode kbn', 'column' => 'barcode_kbn'], 
            ]
        ];
    }


    protected function fields($mode = "create", $id = '-')
    {
        $edit = null;
        if ($id != '-') {
            $edit = $this->modelClass::where('id', $id)->first();
        }

        $fields = [
                    [
                        'type' => 'text',
                        'label' => 'Line no',
                        'name' =>  'line_no',
                        'class' => 'col-md-12 my-2',
                        'required' => $this->flagRules('line_no', $id),
                        'value' => (isset($edit)) ? $edit->line_no : ''
                    ],
                    [
                        'type' => 'text',
                        'label' => 'Carline',
                        'name' =>  'carline',
                        'class' => 'col-md-12 my-2',
                        'required' => $this->flagRules('carline', $id),
                        'value' => (isset($edit)) ? $edit->carline : ''
                    ],
                    [
                        'type' => 'text',
                        'label' => 'Id cust',
                        'name' =>  'id_cust',
                        'class' => 'col-md-12 my-2',
                        'required' => $this->flagRules('id_cust', $id),
                        'value' => (isset($edit)) ? $edit->id_cust : ''
                    ],
                    [
                        'type' => 'text',
                        'label' => 'Id cv',
                        'name' =>  'id_cv',
                        'class' => 'col-md-12 my-2',
                        'required' => $this->flagRules('id_cv', $id),
                        'value' => (isset($edit)) ? $edit->id_cv : ''
                    ],
                    [
                        'type' => 'text',
                        'label' => 'Cv',
                        'name' =>  'cv',
                        'class' => 'col-md-12 my-2',
                        'required' => $this->flagRules('cv', $id),
                        'value' => (isset($edit)) ? $edit->cv : ''
                    ],
                    [
                        'type' => 'text',
                        'label' => 'Cv loding',
                        'name' =>  'cv_loding',
                        'class' => 'col-md-12 my-2',
                        'required' => $this->flagRules('cv_loding', $id),
                        'value' => (isset($edit)) ? $edit->cv_loding : ''
                    ],
                    [
                        'type' => 'text',
                        'label' => 'Assy no',
                        'name' =>  'assy_no',
                        'class' => 'col-md-12 my-2',
                        'required' => $this->flagRules('assy_no', $id),
                        'value' => (isset($edit)) ? $edit->assy_no : ''
                    ],
                    [
                        'type' => 'text',
                        'label' => 'Std box',
                        'name' =>  'std_box',
                        'class' => 'col-md-12 my-2',
                        'required' => $this->flagRules('std_box', $id),
                        'value' => (isset($edit)) ? $edit->std_box : ''
                    ],
                    [
                        'type' => 'text',
                        'label' => 'Nik',
                        'name' =>  'nik',
                        'class' => 'col-md-12 my-2',
                        'required' => $this->flagRules('nik', $id),
                        'value' => (isset($edit)) ? $edit->nik : ''
                    ],
                    [
                        'type' => 'text',
                        'label' => 'Pic prd',
                        'name' =>  'pic_prd',
                        'class' => 'col-md-12 my-2',
                        'required' => $this->flagRules('pic_prd', $id),
                        'value' => (isset($edit)) ? $edit->pic_prd : ''
                    ],
                    [
                        'type' => 'text',
                        'label' => 'Tgl prd',
                        'name' =>  'tgl_prd',
                        'class' => 'col-md-12 my-2',
                        'required' => $this->flagRules('tgl_prd', $id),
                        'value' => (isset($edit)) ? $edit->tgl_prd : ''
                    ],
                    [
                        'type' => 'text',
                        'label' => 'Shift',
                        'name' =>  'shift',
                        'class' => 'col-md-12 my-2',
                        'required' => $this->flagRules('shift', $id),
                        'value' => (isset($edit)) ? $edit->shift : ''
                    ],
                    [
                        'type' => 'text',
                        'label' => 'Pm',
                        'name' =>  'pm',
                        'class' => 'col-md-12 my-2',
                        'required' => $this->flagRules('pm', $id),
                        'value' => (isset($edit)) ? $edit->pm : ''
                    ],
                    [
                        'type' => 'text',
                        'label' => 'Waktu',
                        'name' =>  'waktu',
                        'class' => 'col-md-12 my-2',
                        'required' => $this->flagRules('waktu', $id),
                        'value' => (isset($edit)) ? $edit->waktu : ''
                    ],
                    [
                        'type' => 'text',
                        'label' => 'Serial np',
                        'name' =>  'serial_np',
                        'class' => 'col-md-12 my-2',
                        'required' => $this->flagRules('serial_np', $id),
                        'value' => (isset($edit)) ? $edit->serial_np : ''
                    ],
                    [
                        'type' => 'text',
                        'label' => 'Barcode np',
                        'name' =>  'barcode_np',
                        'class' => 'col-md-12 my-2',
                        'required' => $this->flagRules('barcode_np', $id),
                        'value' => (isset($edit)) ? $edit->barcode_np : ''
                    ],
                    [
                        'type' => 'text',
                        'label' => 'Serial box',
                        'name' =>  'serial_box',
                        'class' => 'col-md-12 my-2',
                        'required' => $this->flagRules('serial_box', $id),
                        'value' => (isset($edit)) ? $edit->serial_box : ''
                    ],
                    [
                        'type' => 'text',
                        'label' => 'Barcode box',
                        'name' =>  'barcode_box',
                        'class' => 'col-md-12 my-2',
                        'required' => $this->flagRules('barcode_box', $id),
                        'value' => (isset($edit)) ? $edit->barcode_box : ''
                    ],
                    [
                        'type' => 'text',
                        'label' => 'Gelombang',
                        'name' =>  'gelombang',
                        'class' => 'col-md-12 my-2',
                        'required' => $this->flagRules('gelombang', $id),
                        'value' => (isset($edit)) ? $edit->gelombang : ''
                    ],
                    [
                        'type' => 'text',
                        'label' => 'Pic prn',
                        'name' =>  'pic_prn',
                        'class' => 'col-md-12 my-2',
                        'required' => $this->flagRules('pic_prn', $id),
                        'value' => (isset($edit)) ? $edit->pic_prn : ''
                    ],
                    [
                        'type' => 'text',
                        'label' => 'Tgl prn',
                        'name' =>  'tgl_prn',
                        'class' => 'col-md-12 my-2',
                        'required' => $this->flagRules('tgl_prn', $id),
                        'value' => (isset($edit)) ? $edit->tgl_prn : ''
                    ],
                    [
                        'type' => 'text',
                        'label' => 'Pic ver',
                        'name' =>  'pic_ver',
                        'class' => 'col-md-12 my-2',
                        'required' => $this->flagRules('pic_ver', $id),
                        'value' => (isset($edit)) ? $edit->pic_ver : ''
                    ],
                    [
                        'type' => 'text',
                        'label' => 'Tgl ver',
                        'name' =>  'tgl_ver',
                        'class' => 'col-md-12 my-2',
                        'required' => $this->flagRules('tgl_ver', $id),
                        'value' => (isset($edit)) ? $edit->tgl_ver : ''
                    ],
                    [
                        'type' => 'text',
                        'label' => 'Item ver',
                        'name' =>  'item_ver',
                        'class' => 'col-md-12 my-2',
                        'required' => $this->flagRules('item_ver', $id),
                        'value' => (isset($edit)) ? $edit->item_ver : ''
                    ],
                    [
                        'type' => 'text',
                        'label' => 'Barcode awal',
                        'name' =>  'barcode_awal',
                        'class' => 'col-md-12 my-2',
                        'required' => $this->flagRules('barcode_awal', $id),
                        'value' => (isset($edit)) ? $edit->barcode_awal : ''
                    ],
                    [
                        'type' => 'text',
                        'label' => 'Barcode kbn',
                        'name' =>  'barcode_kbn',
                        'class' => 'col-md-12 my-2',
                        'required' => $this->flagRules('barcode_kbn', $id),
                        'value' => (isset($edit)) ? $edit->barcode_kbn : ''
                    ],
        ];
        
        return $fields;
    }


    protected function rules($id = null)
    {
        $rules = [
                    'line_no' => 'required|string',
                    'carline' => 'required|string',
                    'id_cust' => 'required|string',
                    'id_cv' => 'required|string',
                    'cv' => 'required|string',
                    'cv_loding' => 'required|string',
                    'assy_no' => 'required|string',
                    'std_box' => 'required|string',
                    'nik' => 'required|string',
                    'pic_prd' => 'required|string',
                    'tgl_prd' => 'required|string',
                    'shift' => 'required|string',
                    'pm' => 'required|string',
                    'waktu' => 'required|string',
                    'serial_np' => 'required|string',
                    'barcode_np' => 'required|string',
                    'serial_box' => 'required|string',
                    'barcode_box' => 'required|string',
                    'gelombang' => 'required|string',
                    'pic_prn' => 'required|string',
                    'tgl_prn' => 'required|string',
                    'pic_ver' => 'required|string',
                    'tgl_ver' => 'required|string',
                    'item_ver' => 'required|string',
                    'barcode_awal' => 'required|string',
                    'barcode_kbn' => 'required|string',
        ];

        return $rules;
    }

}
