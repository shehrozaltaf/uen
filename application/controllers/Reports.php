<?php ob_start();
header('Content-type: text/html; charset=utf-8');

class Reports extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('mprojects');
        $this->load->library('session');
       
        $this->load->helper('string');
        $this->load->model('msection');
        if (!isset($_SESSION['login']['idUser'])) {
            redirect(base_url());
        }
    }

    function index()
    {
        $MProjects = new MProjects();
        $data = array();
        $data['projects'] = $MProjects->getAllProjects();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('reports', $data);
        $this->load->view('include/footer');
    }

    function questionArr($dataarr)
    {
        $myresult = array();
        foreach ($dataarr as $key => $value) {
            if (isset($value->idParentQuestion) && $value->idParentQuestion != '' && array_key_exists(strtolower($value->idParentQuestion), $myresult)) {
                $mykey = strtolower($value->idParentQuestion);
                $myresult[strtolower($mykey)]->myrow_options[] = $value;
            } else {
                $mykey = strtolower($value->variable_name);
                $myresult[strtolower($mykey)] = $value;
            }
        }
        $data = array();
        foreach ($myresult as $val) {
            $data[] = $val;
        }
        return $data;
    }

    function getPDF()
    {
        if (isset($_REQUEST['project']) && $_REQUEST['project'] != '' && $_REQUEST['project'] != 0) {
            $this->load->library('tcpdf'); 

            $GetReportData = $MProjects->getPDFData($searchData);
            $project_name = $GetReportData[0]->project_name;
            $short_title = strtoupper($GetReportData[0]->short_title);
            $title = $project_name . ' (' . $short_title . ')';
            $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Dictionary Portal');
            $pdf->SetTitle($title);
            $pdf->SetSubject($title);
            $pdf->SetKeywords($title);
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->SetTopMargin(1);
            $pdf->setPrintHeader(false);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
            if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
                require_once(dirname(__FILE__) . '/lang/eng.php');
            }
            $pdf->setFontSubsetting(true);
            $pdf->SetFont('freeserif', '', 12);
            $style = "<style>
                        h1{text-align: center; font-size: 30px;  color: #002D57;}
                        h3{text-align: center; font-size: 22px;}
                        h4{font-size: 18px;}
                        small{font-size: 12px}   
                     </style>";
            foreach ($GetReportData as $projectsCrfs) {
                $searchData['idCRF'] = $projectsCrfs->id_crf;
                $crf_name = $projectsCrfs->crf_name;
                $crf_title = $crf_name . ' (' . strtoupper($projectsCrfs->crf_title) . ')';
                $Mainheader = "<div class='head'>
                                    <h1 class='mainheading'>" . $title . "</h1>
                                    <h3 class='subheading'>" . $crf_title . "</h3>
                               </div>";
                $pdf->AddPage();
                $pdf->writeHTML($style . $Mainheader, true, false, true, false, 'centre');
                $getModules = $MModule->getModulesData($searchData);
                foreach ($getModules as $keyModule => $valueModule) {
                    $l = 0;
                    $subhtml = "<div class='moduleDiv'>";
                    if (isset($valueModule->module_name_l1) && $valueModule->module_name_l1 != '' &&
                        $displaylanguagel1 == 'on') {
                        $subhtml .= "<h4>" . htmlentities($valueModule->module_name_l1) . " : <small>" . $valueModule->module_desc_l1 . "</small></h4>";
                    }
                    if (isset($valueModule->module_name_l2) && $valueModule->module_name_l2 != '' &&
                        $displaylanguagel2 == 'on') {
                        $subhtml .= "<h4>" . $valueModule->module_name_l2 . "</h4><h5>" . $valueModule->module_desc_l2 . "</h5>";
                    }
                    if (isset($valueModule->module_name_l3) && $valueModule->module_name_l3 != '' &&
                        $displaylanguagel3 == 'on') {
                        $subhtml .= "<h4>" . $valueModule->module_name_l3 . "</h4><h5>" . $valueModule->module_desc_l3 . "</h5>";
                    }
                    if (isset($valueModule->module_name_l4) && $valueModule->module_name_l4 = '' &&
                            $displaylanguagel4 == 'on') {
                        $subhtml .= "<h4>" . $valueModule->module_name_l4 . "</h4><h5>" . $valueModule->module_desc_l4 . "</h5>";
                    }
                    if (isset($valueModule->module_name_l5) && $valueModule->module_name_l5 != '' &&
                        $displaylanguagel5 == 'on') {
                        $subhtml .= "<h4>" . $valueModule->module_name_l5 . " </h4><h5>" . $valueModule->module_desc_l5 . "</h5>";
                    }
                    $subhtml .= "</div>";
                    $ModuleSearchData = array();
                    $ModuleSearchData['idModule'] = $valueModule->idModule;
                    $ModuleSearchData['idSection'] = $searchData['idSection'];
                    $getSections = $MSection->getSectionData($ModuleSearchData);
                    foreach ($getSections as $keySection => $valueSection) {
                        $l++;
                        if (isset($valueSection->section_title) && $valueSection->section_title != '') {
                            $sectionHeading = $valueModule->variable_module . $valueSection->section_var_name . ": " . htmlentities($valueSection->section_title) . " : " . $valueSection->section_desc;
                        }
                        if (isset($searchData['idSection']) && $searchData['idSection'] != 0) {
                            $ModuleSearchData['idSection'] = $searchData['idSection'];
                        } else {
                            $ModuleSearchData['idSection'] = $valueSection->idSection;
                        }
                        $getSectionDetails = $MSection->getSectionDetailData($ModuleSearchData);

                        $myresult = $this->questionArr($getSectionDetails);

                        $optionsubhtml = '<style>table tr {font-size: 13px}table tr th {font-size: 14px; font-weight: bold}
                                            .fright{float: right}
                                           </style>';
                        if ($l == 1) {
                            $optionsubhtml .= $subhtml;
                        }
                        $optionsubhtml .= '<table border="1" cellpadding="2" cellspacing="1"    >
                                       <tr  align="center">
                                                 <th colspan="4" >' . $sectionHeading . '</th>
                                            </tr>
                                            <tr  align="center">
                                                <th  width="7%">Variable</th>
                                                <th width="50%">Label</th> 
                                                <th width="36%">Options</th>
                                                <th width="7%">Other</th>
                                            </tr>'; 
                        $optionsubhtml .= "</table>";
                        $pdf->AddPage();
                        $pdf->writeHTML($optionsubhtml, true, false, false, false, '');
                    }
                }
            }
            $bMargin = $pdf->getBreakMargin();
            $auto_page_break = $pdf->getAutoPageBreak();
            $pdf->SetAutoPageBreak(true, 0);
            $pdf->SetAutoPageBreak($auto_page_break, $bMargin);
            $pdf->setPageMark();
            ob_end_clean();
            $pdf->Output('dictionary.pdf', 'I');
        } else {
            echo 'Invalid Project, Please select project';
        }
    }

    function getXml()
    {
        ob_end_clean();
        if (isset($_REQUEST['section']) && $_REQUEST['section'] != '' && $_REQUEST['section'] != 0) {
            $this->load->model('msection');
            $MSection = new MSection();
            $searchData = array();
            $searchData['idProjects'] = $_REQUEST['project'];
            $searchData['idCRF'] = (isset($_REQUEST['crf']) && $_REQUEST['crf'] != '' && $_REQUEST['crf'] != 0 ? $_REQUEST['crf'] : 0);
            $searchData['idModule'] = (isset($_REQUEST['module']) && $_REQUEST['module'] != '' && $_REQUEST['module'] != 0 ? $_REQUEST['module'] : 0);
            $searchData['idSection'] = (isset($_REQUEST['section']) && $_REQUEST['section'] != '' && $_REQUEST['section'] != 0 ? $_REQUEST['section'] : 0);
            $xml_layout_name = 'Myactivity';
            $result = $MSection->getSectionDetailData($searchData);
            $data = $this->questionArr($result);
            $xml = '<layout xmlns:android="http://schemas.android.com/apk/res/android"  xmlns:tools="http://schemas.android.com/tools" 
  xmlns:app="http://schemas.android.com/apk/res-auto"> 
    <data> 
        <import type="android.view.View" /> 
        <variable name="callback" type="edu.aku.hassannaqvi.template.ui.' . $xml_layout_name . '"/>
    </data> 
    <ScrollView style="@style/i_scrollview"     android:fadeScrollbars="false"  android:fillViewport="true"  
    android:scrollbarSize="10dip" tools:context=".ui.' . $xml_layout_name . '">
   <LinearLayout android:id="@+id/GrpName" android:layout_width="match_parent"  android:layout_height="wrap_content"android:orientation="vertical">';
            foreach ($data as $key => $value) {
                $xml .= "\n\n" . ' <!-- ' . strtolower($value->variable_name) . '  ' . $value->nature . '   -->' . "\n";
                $xml .= '<androidx.cardview.widget.CardView
                android:id="@+id/fldGrpCV' . strtolower($value->variable_name) . '"
                style="@style/cardView">
                <LinearLayout
                    android:layout_width="match_parent"
                    android:layout_height="wrap_content"
                    android:orientation="vertical">
                    <TextView
                        style="@style/i_textview"
                        android:text="@string/' . strtolower($value->variable_name) . '" />';
                if (isset($value->myrow_options) && $value->myrow_options != '') {
                    if ($value->nature == 'Radio') {
                        $xml .= '<RadioGroup
                        android:id="@+id/' . strtolower($value->variable_name) . '"
                        android:layout_width="match_parent"
                        android:layout_height="match_parent">';
                    }
                    if ($value->nature == 'CheckBox') {
                        $xml .= '<LinearLayout
                                android:id="@+id/' . strtolower($value->variable_name) . 'check"
                                android:layout_width="match_parent"
                                android:layout_height="wrap_content"
                                android:orientation="vertical"
                                android:tag="0">';
                    }
                    foreach ($value->myrow_options as $options) {

                        if ($value->nature == 'Radio' && ($options->nature == 'Input' || $options->nature == 'Input-Numeric')) {
                            $xml .= '<RadioButton
                                        android:id="@+id/' . strtolower($options->variable_name) . '"
                                        style="@style/radiobutton"
                                        android:text="@string/' . strtolower($options->variable_name) . '" />
                            <EditText
                            android:id="@+id/' . strtolower($options->variable_name) . 't"
                            style="@style/radiobutton"
                            android:layout_width="match_parent"
                            android:layout_height="wrap_content" 
                            android:hint="@string/' . strtolower($options->variable_name) . '"
                            android:tag="' . strtolower($options->variable_name) . '"
                            android:text=\'@{' . strtolower($options->variable_name) . '.checked? ' . strtolower($options->variable_name) . 't.getText().toString() : ""}\'
                            android:visibility=\'@{' . strtolower($options->variable_name) . '.checked? View.VISIBLE : View.GONE}\' />';
                        } elseif ($value->nature == 'CheckBox' && ($options->nature == 'Input' || $options->nature == 'Input-Numeric')) {
                            $xml .= '<CheckBox
                                        android:id="@+id/' . strtolower($options->variable_name) . '"
                                        style="@style/checkbox"
                                        android:text="@string/' . strtolower($options->variable_name) . '" />                       
                            <EditText
                            android:id="@+id/' . strtolower($options->variable_name) . 't"
                            style="@style/radiobutton"
                            android:layout_width="match_parent"
                            android:layout_height="wrap_content" 
                            android:hint="@string/' . strtolower($options->variable_name) . '"
                            android:tag="' . strtolower($options->variable_name) . '"
                            android:text=\'@{' . strtolower($options->variable_name) . '.checked? ' . strtolower($options->variable_name) . 't.getText().toString() : ""}\'
                            android:visibility=\'@{' . strtolower($options->variable_name) . '.checked? View.VISIBLE : View.GONE}\' />';
                        } elseif ($options->nature == 'Input-Numeric') {
                            $minVal = 0;
                            $maxVal = 0;
                            if (isset($options->MaxVal) && $options->MaxVal != '') {
                                $maxVal = $options->MaxVal;
                            }
                            if (isset($options->MinVal) && $options->MinVal != '') {
                                $minVal = $options->MinVal;
                            }
                            $xml .= '<TextView
                        style="@style/i_textview"
                        android:text="@string/' . strtolower($options->variable_name) . '" />
                            <com.edittextpicker.aliazaz.EditTextPicker
                                    android:id="@+id/' . strtolower($options->variable_name) . '"
                                    android:layout_width="match_parent"
                                    android:layout_height="wrap_content" 
                                    android:hint="@string/' . strtolower($options->variable_name) . '"
                                    style="@style/EditTextAlphaNumeric"
                                    android:inputType="number"
                                    app:mask="##"
                                    app:maxValue="' . $maxVal . '"
                                    app:minValue="' . $minVal . '"
                                    app:type="range" />';
                        } elseif ($options->nature == 'Input') {
                            $xml .= '<TextView
                        style="@style/i_textview"
                        android:text="@string/' . strtolower($options->variable_name) . '" />
                            <EditText
                                android:id="@+id/' . strtolower($options->variable_name) . '"
                                style="@style/textInputName"
                                android:layout_width="match_parent"
                                android:layout_height="wrap_content"  
                                android:hint="@string/' . strtolower($options->variable_name) . '" 
                                android:textColor="@android:color/black" />';
                        } elseif ($options->nature == 'Title') {
                            $xml .= '  <TextView
                        style="@style/i_textview"
                        android:text="@string/' . strtolower($options->variable_name) . '" />';
                        } elseif ($options->nature == 'Radio') {
                            $xml .= '<RadioButton
                                        android:id="@+id/' . strtolower($options->variable_name) . '"
                                        style="@style/radiobutton"
                                        android:text="@string/' . strtolower($options->variable_name) . '" />';
                        } elseif ($options->nature == 'CheckBox') {
                            $xml .= ' <CheckBox
                            android:id="@+id/' . strtolower($options->variable_name) . '"
                            style="@style/checkbox"
                            android:text="@string/' . strtolower($options->variable_name) . '" />';
                        }
                    }
                    if ($value->nature == 'Radio') {
                        $xml .= '</RadioGroup>';
                    }

                    if ($value->nature == 'CheckBox') {
                        $xml .= '</LinearLayout>';
                    }
                } else {
                    if ($value->nature == 'Input-Numeric') {
                        $minVal = 0;
                        $maxVal = 0;
                        if (isset($value->MaxVal) && $value->MaxVal != '') {
                            $maxVal = $value->MaxVal;
                        }
                        if (isset($value->MinVal) && $value->MinVal != '') {
                            $minVal = $value->MinVal;
                        }
                        $xml .= '<com.edittextpicker.aliazaz.EditTextPicker
                                    android:id="@+id/' . strtolower($value->variable_name) . '"
                                    android:layout_width="match_parent"
                                    android:layout_height="wrap_content" 
                                    style="@style/EditTextAlphaNumeric"
                                    android:inputType="number"
                                    android:hint="@string/' . strtolower($value->variable_name) . '"
                                    app:mask="##"
                                    app:maxValue="' . $maxVal . '"
                                    app:minValue="' . $minVal . '"
                                    app:type="range" />';
                    } elseif ($value->nature == 'Input') {
                        $xml .= '<EditText
                                android:id="@+id/' . strtolower($value->variable_name) . '"
                                style="@style/textInputName"
                                android:layout_width="match_parent"
                                android:layout_height="wrap_content" 
                                android:hint="@string/' . strtolower($value->variable_name) . '" 
                                android:textColor="@android:color/black" />';
                    } elseif ($value->nature == 'Title') {
                    }
                }
                $xml .= ' </LinearLayout>
            </androidx.cardview.widget.CardView>';
            }
            $xml .= ' <LinearLayout android:layout_width="match_parent" android:layout_height="wrap_content"
                          android:layout_gravity="end" android:layout_marginTop="20dp" android:orientation="horizontal">
                <Button android:id="@+id/btn_End" style="@style/button" android:layout_marginRight="10dp"
                        android:onClick="@{() -> callback.BtnEnd()}" android:text="Cancel"/>
                <Button android:id="@+id/btn_Continue" style="@style/button"
                        android:onClick="@{() -> callback.BtnContinue()}"
                        android:text="Save"/>
                        <!--\'onClick\' for btn_End will NOT change and always call \'endInterview\'-->
            </LinearLayout>';
            $xml .= '</LinearLayout>
    </ScrollView>
</layout>';
            $file = "assets/uploads/myfiles/myactivity.xml";
            $txt = fopen($file, "w") or die("Unable to open file!");
            fwrite($txt, $xml);
            fclose($txt);
            header('Content-Description: File Transfer');
            header('Content-Disposition: attachment; filename=' . basename($file));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            header("Content-Type: text/xml");
            readfile($file);
        } else {
            echo 'Invalid Project, Please select project';
        }
    }

    function getStings()
    {
        ob_end_clean();
        $flag = 0;
        $MSection = new MSection();
        $searchData = array();
        $searchData['idProjects'] = $_REQUEST['project'];
        $searchData['idCRF'] = (isset($_REQUEST['crf']) && $_REQUEST['crf'] != '' && $_REQUEST['crf'] != 0 ? $_REQUEST['crf'] : 0);
        $searchData['idModule'] = (isset($_REQUEST['module']) && $_REQUEST['module'] != '' && $_REQUEST['module'] != 0 ? $_REQUEST['module'] : 0);
        $searchData['idSection'] = (isset($_REQUEST['section']) && $_REQUEST['section'] != '' && $_REQUEST['section'] != 0 ? $_REQUEST['section'] : 0);
        if (isset($_REQUEST['language']) && $_REQUEST['language'] != '' && $_REQUEST['language'] != '0') {
            $lang = 'label_' . $_REQUEST['language'];
        } else {
            $lang = 'label_l1';
        }
        $fileEngSting = '';
        if (isset($searchData['section']) && $searchData['section'] != '' && $searchData['section'] != 0) {
            $result = $MSection->getSectionDetailData($searchData);
            foreach ($result as $key => $value) {
                $fileEngSting .= '<string name="' . strtolower($value->variable_name) . '"> ' . ($value->idParentQuestion == null || $value->idParentQuestion == '' ? strtolower($value->variable_name) . ':\t ' : '') . htmlspecialchars($value->$lang) . '</string>' . "\n";
            }
        } elseif (isset($searchData['idModule']) && $searchData['idModule'] != '' && $searchData['idModule'] != 0) {
            $getSectionData = $MSection->getSectionData($searchData);
            foreach ($getSectionData as $data) {
                $searchData['idSection'] = $data->idSection;
                $result = $MSection->getSectionDetailData($searchData);
                foreach ($result as $key => $value) {
                    $fileEngSting .= '<string name="' . strtolower($value->variable_name) . '"> ' . ($value->idParentQuestion == null || $value->idParentQuestion == '' ? strtolower($value->variable_name) . ':\t ' : '') . htmlspecialchars($value->$lang) . '</string>' . "\n";
                }
            }
        } elseif (isset($searchData['idCRF']) && $searchData['idCRF'] != '' && $searchData['idCRF'] != 0) {
            $this->load->model('mmodule');
            $MModule = new MModule();
            $searchcrfdata = array();
            $searchcrfdata['idCRF'] = $searchData['idCRF'];
            $getModByCrf = $MModule->getModulesData($searchcrfdata);
            foreach ($getModByCrf as $mod) {
                $searchData['idSection'] = '';
                $searchData['idModule'] = $mod->idModule;
                $getSectionData = $MSection->getSectionData($searchData);
                foreach ($getSectionData as $data) {
                    $searchData['idSection'] = $data->idSection;
                    $result = $MSection->getSectionDetailData($searchData);
                    foreach ($result as $key => $value) {
                        $fileEngSting .= '<string name="' . strtolower($value->variable_name) . '"> ' . ($value->idParentQuestion == null || $value->idParentQuestion == '' ? strtolower($value->variable_name) . ':\t ' : '') . htmlspecialchars($value->$lang) . '</string>' . "\n";
                    }
                }
            }
        } else {
            $flag = 1;
        }
        if ($flag == 0) {
            $file = 'assets/uploads/myfiles/' . $lang . "sting.xml";
            $txt = fopen($file, "w") or die("Unable to open file!");
            fwrite($txt, $fileEngSting);
            fclose($txt);
            header('Content-Description: File Transfer');
            header('Content-Disposition: attachment; filename=' . basename($file));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            header("Content-Type: text/xml");
            readfile($file);
        } else {
            echo 'Invalid Section, Please provide proper details';
        }
    }

    function getSaveDraftData()
    {
        ob_end_clean();
        if (isset($_REQUEST['section']) && $_REQUEST['section'] != '' && $_REQUEST['section'] != 0) {
            $this->load->model('msection');
            $MSection = new MSection();
            $searchData = array();
            $searchData['idProjects'] = $_REQUEST['project'];
            $searchData['idCRF'] = (isset($_REQUEST['crf']) && $_REQUEST['crf'] != '' && $_REQUEST['crf'] != 0 ? $_REQUEST['crf'] : 0);
            $searchData['idModule'] = (isset($_REQUEST['module']) && $_REQUEST['module'] != '' && $_REQUEST['module'] != 0 ? $_REQUEST['module'] : 0);
            $searchData['idSection'] = (isset($_REQUEST['section']) && $_REQUEST['section'] != '' && $_REQUEST['section'] != 0 ? $_REQUEST['section'] : 0);
            $result = $MSection->getSectionDetailData($searchData);
            $data = $this->questionArr($result);
            $fileData = 'JSONObject f1 = new JSONObject(); ' . "\n";
            foreach ($data as $key => $value) {
                $fileOtherData = '';
                $question_type = $value->nature;
                if ($question_type == 'Input-Numeric') {
                    $fileData .= 'f1.put("' . strtolower($value->variable_name) . '", bi.' . strtolower($value->variable_name) . '.getText().toString());' . "\n";
                    if (isset($value->myrow_options) && $value->myrow_options != '') {
                        foreach ($value->myrow_options as $options) {
                            if ($options->nature == 'Input-Numeric') {
                                $fileOtherData .= 'f1.put("' . strtolower($options->variable_name) . '", bi.' . strtolower($options->variable_name) . '.getText().toString());' . "\n";
                            } elseif ($options->nature == 'Input') {
                                $fileOtherData .= 'f1.put("' . strtolower($options->variable_name) . '", bi.' . strtolower($options->variable_name) . '.getText().toString());' . "\n";
                            } elseif ($options->nature == 'Title') {
//                                $fileOtherData .= 'f1.put("' . strtolower($options->variable_name) . '", bi.' . strtolower($options->variable_name) . '.getText().toString());' . "\n";
                            }
                        }
                    }
                    $fileData .= $fileOtherData;
                } elseif ($question_type == 'Input') {
                    $fileData .= 'f1.put("' . strtolower($value->variable_name) . '", bi.' . strtolower($value->variable_name) . '.getText().toString());' . "\n";
                    if (isset($value->myrow_options) && $value->myrow_options != '') {
                        foreach ($value->myrow_options as $options) {
                            if ($options->nature == 'Input-Numeric') {
                                $fileOtherData .= 'f1.put("' . strtolower($options->variable_name) . '", bi.' . strtolower($options->variable_name) . '.getText().toString());' . "\n";
                            } elseif ($options->nature == 'Input') {
                                $fileOtherData .= 'f1.put("' . strtolower($options->variable_name) . '", bi.' . strtolower($options->variable_name) . '.getText().toString());' . "\n";
                            } elseif ($options->nature == 'Title') {
//                                $fileOtherData .= 'f1.put("' . strtolower($options->variable_name) . '", bi.' . strtolower($options->variable_name) . '.getText().toString());' . "\n";
                            }
                        }
                    }
                    $fileData .= $fileOtherData;
                } elseif ($question_type == 'Title') {
//                    $fileData .= 'f1.put("' . strtolower($value->variable_name) . '", bi.' . strtolower($value->variable_name) . '.getText().toString());' . "\n";
                    if (isset($value->myrow_options) && $value->myrow_options != '') {
                        foreach ($value->myrow_options as $options) {
                            if ($options->nature == 'Input-Numeric') {
                                $fileOtherData .= 'f1.put("' . strtolower($options->variable_name) . '", bi.' . strtolower($options->variable_name) . '.getText().toString());' . "\n";
                            } elseif ($options->nature == 'Input') {
                                $fileOtherData .= 'f1.put("' . strtolower($options->variable_name) . '", bi.' . strtolower($options->variable_name) . '.getText().toString());' . "\n";
                            } elseif ($options->nature == 'Title') {
//                                $fileOtherData .= 'f1.put("' . strtolower($options->variable_name) . '", bi.' . strtolower($options->variable_name) . '.getText().toString());' . "\n";
                            }
                        }
                    }
                    $fileData .= $fileOtherData;
                } elseif ($question_type == 'Radio') {
                    $fileData .= 'f1.put("' . strtolower($value->variable_name) . '", ' . "\n";
                    if (isset($value->myrow_options) && $value->myrow_options != '') {
                        foreach ($value->myrow_options as $options) {
                            if ($options->nature == 'Title') {
                                $fileData .= '';
                            } else {
                                $fileData .= 'bi.' . strtolower($options->variable_name) . '.isChecked() ?"' . $options->option_value . '" : ' . "\n";
                            }
                            if ($options->nature == 'Input-Numeric') {
                                $fileOtherData .= 'f1.put("' . strtolower($options->variable_name) . 't", bi.' . strtolower($options->variable_name) . 't.getText().toString());' . "\n";
                            } elseif ($options->nature == 'Input') {
                                $fileOtherData .= 'f1.put("' . strtolower($options->variable_name) . 't", bi.' . strtolower($options->variable_name) . 't.getText().toString());' . "\n";
                            }
                        }
                    }
                    $fileData .= ' "0"); ' . "\n";
                    $fileData .= $fileOtherData;
                } elseif ($question_type == 'CheckBox') {
                    if (isset($value->myrow_options) && $value->myrow_options != '') {
                        foreach ($value->myrow_options as $options) {
                            $fileOtherData .= 'f1.put("' . strtolower($options->variable_name) . '",bi.' . strtolower($options->variable_name) . '.isChecked() ?"' . $options->option_value . '" :"0");' . "\n";
                            if ($options->nature == 'Input-Numeric') {
                                $fileOtherData .= 'f1.put("' . strtolower($options->variable_name) . 't", bi.' . strtolower($options->variable_name) . 't.getText().toString());' . "\n";
                            } elseif ($options->nature == 'Input') {
                                $fileOtherData .= 'f1.put("' . strtolower($options->variable_name) . 't", bi.' . strtolower($options->variable_name) . 't.getText().toString());' . "\n";
                            } elseif ($options->nature == 'Title') {
//                                $fileOtherData .= 'f1.put("' . strtolower($options->variable_name) . '", bi.' . $options->variable_name . '.getText().toString());' . "\n";
                            }
                        }
                    }
                    $fileData .= $fileOtherData;
                }
            }
            $file = "assets/uploads/myfiles/savedraft.java";
            $txt = fopen($file, "w") or die("Unable to open file!");
            fwrite($txt, $fileData);
            fclose($txt);
            header('Content-Description: File Transfer');
            header('Content-Disposition: attachment; filename=' . basename($file));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            header("Content-Type: text/plain");
            readfile($file);
        } else {
            echo 'Invalid Project, Please select project';
        }
    }

    function getCodeBook()
    {
        if (isset($_REQUEST['project']) && $_REQUEST['project'] != '' && $_REQUEST['project'] != 0) {
            $this->load->library('excel');
            $idProject = $_REQUEST['project'];
            $this->load->model('mmodule');
            $this->load->model('msection');
            $MSection = new MSection();
            $searchData = array();
            $searchData['idProjects'] = $idProject;
            $searchData['idCRF'] = (isset($_REQUEST['crf']) && $_REQUEST['crf'] != '' && $_REQUEST['crf'] != 0 ? $_REQUEST['crf'] : 0);
            $searchData['idModule'] = (isset($_REQUEST['module']) && $_REQUEST['module'] != '' && $_REQUEST['module'] != 0 ? $_REQUEST['module'] : 0);
            $searchData['idSection'] = (isset($_REQUEST['section']) && $_REQUEST['section'] != '' && $_REQUEST['section'] != 0 ? $_REQUEST['section'] : 0);
            $searchData['language'] = (isset($_REQUEST['language']) && $_REQUEST['language'] != '' ? $_REQUEST['language'] : 0);
            $result = $MSection->getCodeBookData($searchData);
            $data = $this->questionArr($result);
            $fileName = 'codebook_' . $data[0]->crf_name . '.xlsx';
            $objPHPExcel = new    PHPExcel();
            $objPHPExcel->setActiveSheetIndex(0);
            $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Inst');
            $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Variable Name');
            $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Variable Label');
            $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Answer Code');
            $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Answer Label');
            $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Type');
            $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Table Name');
            $objPHPExcel->getActiveSheet()->getStyle("A1:Z1")->getFont()->setBold(true);
            $rowCount = 1;
            foreach ($data as $list) {
                $rowCount++;
                $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->crf_name);
                $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, strtolower($list->variable_name));
                $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->label_l1);
                $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->option_value);
                $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, '');
                $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $list->dbType);
                $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $list->tableName);
                if (isset($list->myrow_options) && $list->myrow_options != '') {
                    foreach ($list->myrow_options as $options) {
                        $rowCount++;
                        $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $options->crf_name);
                        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, '');
                        $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, '');
                        $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $options->option_value);
                        $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $options->label_l1);
                        $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, '');
                        $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $options->tableName);
                        if (($list->nature == 'Radio' && $options->nature == 'Input') || $options->nature == 'CheckBox' || $list->nature == 'CheckBox') {
                            $rowCount++;
                            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $options->crf_name);
                            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, strtolower($options->variable_name) . 't');
                            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $options->label_l1);
                            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, '');
                            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, '');
                            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, '');
                            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $options->tableName);
                        }
                    }
                }
            }
            $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
            header('Content-Type: application/vnd.ms-excel'); //mime type
            header('Content-Disposition: attachment;filename="' . $fileName . '"'); //tell browser what's the file name
            header('Cache-Control: max-age=0'); //no cache
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
            $objWriter->save('php://output');
        } else {
            echo 'Invalid Project, Please select project';
        }
    }

    function getExcel($slug)
    {
        ob_end_clean();
        $this->load->model('msection');
        $fileName = 'data-dictionaryportal-' . time() . '.xlsx';
        $this->load->library('excel');
        $MSection = new MSection();
        $searchData = array();
        $searchData['idSection'] = $slug;
        $myresult = array();
        $searchData = array();
        $searchData['idSection'] = (isset($slug) && $slug != '' && $slug != 0 ? $slug : 0);
        $result = $MSection->getSectionDetailData($searchData);
        $data = $this->questionArr($result);
        $objPHPExcel = new    PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Variable');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Variable App');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Type');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Values');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Skip On xml');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Tag No');
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Min Range');
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Max Range');
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Language 1');
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Language 2');
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Language 3');
        $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Language 4');
        $objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Language 5');
        $objPHPExcel->getActiveSheet()->getStyle("A1:Z1")->getFont()->setBold(true);
        $rowCount = 1;
        foreach ($data as $list) {
            $rowCount++;
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->variable_name);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->variable_name);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->nature_var);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->option_value);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->skipQuestion);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $list->skipQuestion);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $list->MinVal);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $list->MaxVal);
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $list->label_l1);
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $list->label_l2);
            $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $list->label_l3);
            $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $list->label_l4);
            $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $list->label_l5);
            if (isset($list->myrow_options) && $list->myrow_options != '') {
                foreach ($list->myrow_options as $options) {
                    $rowCount++;
                    $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $options->variable_name);
                    $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $options->variable_name);
                    $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $options->nature_var);
                    $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $options->option_value);
                    $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $options->skipQuestion);
                    $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $options->skipQuestion);
                    $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $options->MinVal);
                    $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $options->MaxVal);
                    $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $options->label_l1);
                    $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $options->label_l2);
                    $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $options->label_l3);
                    $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $options->label_l4);
                    $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $options->label_l5);
                }
            }
            $rowCount++;
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, '?');
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, '?');
        }
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="' . $fileName . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
    }

    function getTableQuery()
    {
        ob_end_clean();
        $MSection = new MSection();
        $searchData = array();
        $searchData['idSection'] = (isset($_REQUEST['section']) && $_REQUEST['section'] != '' && $_REQUEST['section'] != 0 ? $_REQUEST['section'] : 0);
        $getTableName = $MSection->getSectionDataById($searchData);
        if (isset($getTableName[0]->tableName) && $getTableName[0]->tableName != '') {
            $tableName = $getTableName[0]->tableName;
            $result = $MSection->getSectionDetailData($searchData);
            $data = $this->questionArr($result);
            $queryPrint = "CREATE TABLE " . $tableName . " (  \n";
            foreach ($data as $list) {
                $queryPrint .= strtolower($list->variable_name) . " " . (isset($list->dbType) && $list->dbType != '' ? $list->dbType : 'varchar') . "(" . (isset($list->dbType) && $list->dbType != '' ? $list->dbLength : '255') . "), " . "\n";
                if (isset($list->myrow_options) && $list->myrow_options != '') {
                    foreach ($list->myrow_options as $options) {
                        if (($list->nature == 'Radio' && $options->nature == 'Input') || $options->nature == 'CheckBox' || $list->nature == 'CheckBox') {
                            $queryPrint .= strtolower($options->variable_name) . " " . (isset($options->dbType) && $options->dbType != '' ? $options->dbType : 'varchar') . "(" . (isset($options->dbType) && $options->dbType != '' ? $options->dbLength : '255') . "), " . "\n";
                        }
                    }
                }
            }
            $queryPrint .= "  );";
            echo $queryPrint;
        } else {
            echo 'Invalid Table Name';
        }

    }
} ?>