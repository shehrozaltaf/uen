<body class="hold-transition skin-blue sidebar-mini fixed">
<style>
    @import url(https://fonts.googleapis.com/earlyaccess/notonaskharabic.css);

    .urdu {
        font-family: 'Noto Naskh Arabic', serif;
        font-size: 18px;
        direction: rtl;
        /*font-family: "Jameel Noori Nastaleeq"; */
    }

    .myheading {
        display: flex;
        width: 100%;
        justify-content: center;
        align-items: center;
        text-align: center;
        color: #1a42d4;
        font-size: 22px;
    }

    .myheading:before,
    .myheading:after {
        content: '';
        border-top: 2px solid;
        margin: 0 20px 0 0;
        flex: 1 0 20px;
    }

    .myheading:after {
        margin: 0 0 0 20px;
    }

    .myheading2 {
        width: 100%;
        justify-content: center;
        align-items: center;
        text-align: center;
        color: #1a42d4;
        font-size: 18px;
    }

    /* env */
    body {
        background: linear-gradient(#A0BAF7, #4CACC1);
        min-height: 100vh;
    }

    h2 {
        margin: 30px 0;
        font: 700 2em/1.4 'Avenir', sans-serif;
        color: #FFF;
    }

    .inp {
        direction: ltr;
    }
</style>

<div class="wrapper">
    <?php echo $this->load->view('includes/header'); ?>
    <?php echo $this->load->view('includes/sidebar'); ?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                <?php echo $heading; ?>
                <small></small>
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-body  ">
                            <div class="col-md-12">

                                <?php if ($this->session->flashdata('message')) {
                                    $message = $this->session->flashdata('message');
                                    echo $message;
                                } ?>

                                <?= validation_errors("<p style='color:red;'>", "</p>") ?>
                                <?php if (validation_errors()) { ?>
                                    <hr style="border: none; height: 5px;color: #333;background-color:red;"><?php } ?>
                                <?php echo form_open_multipart("index.php/Forms/submitForm"); ?>
                                <div class="box-body urdu">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h4>
                                                    <small>cluster_no :</small>
                                                    کلسٹر نمبر
                                                </h4>
                                                <input type="text" id="cluster_no" class="inp" maxlength="6"
                                                       value="<?php echo set_value('cluster_no', $this->session->userdata('cluster_no')); ?>"
                                                       name="cluster_no" required>
                                            </div>

                                        </div>
                                    </div>
                                    <hr class="hr">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h4>
                                                    <small>hhno :</small>
                                                    گھریلو نمبر
                                                </h4>
                                                <input type="text" id="hhno" class="inp" name="hhno"
                                                       value="<?php echo set_value('hhno', $this->session->userdata('hhno')); ?>"
                                                       required>
                                                <button type="button" class="checkBtn" onclick="checkCluster()">Check
                                                    Cluster
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <hr class="hr">

                                    <div class="<?php if (!isset($_POST['hhhead']) || $_POST['hhhead'] == '' || !isset($_POST['d102']) || $_POST['d102'] == '') {
                                        echo 'hide';
                                    } ?> mainform">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h4>
                                                        <small>hhhead :</small>
                                                        گھر کے سربراہ کا نام
                                                    </h4>
                                                    <input type="text" id="hhhead" class="inp" name="hhhead" required
                                                           value="<?php echo set_value('hhhead', $this->session->userdata('hhhead')); ?>">
                                                </div>

                                            </div>
                                        </div>
                                        <hr class="hr">


                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h4>
                                                        <small>d102 :</small>
                                                        جواب دہندگان / ایم ڈبلیو آر اے کا نام
                                                    </h4>
                                                    <input type="text" id="d102" class="inp" name="d102" required
                                                           value="<?php echo set_value('d102', $this->session->userdata('d102')); ?>">
                                                </div>

                                            </div>
                                        </div>
                                        <hr class="hr">
                                        <p class="myheading"> سیکشن ایف : حمل کی
                                            دیکھ بھال
                                        </p>
                                        <p class="myheading2">اب میں آپ کے گزشتہ حمل، بچے کی پیدائش اور آپ کی صحت کی
                                            دیکھ
                                            بھال سے متعلق رویوں
                                            کی معلومات حاصل کرنے جا رہی ہوں</p>
                                        <div class="row urdu">
                                            <div class="col-md-12">
                                                <h4>
                                                    <small>f101 :</small>
                                                    کیا آپ نے اپنے آخری حمل کے دوران (نام) کی پیدائش سے قبل حمل کی دیکھ
                                                    بھال
                                                    کے لئے کسی سے معائنہ یا چیک اپ کروایا تھا؟
                                                </h4>
                                                <input type="Radio" name="f101" value="1" id="f101y"
                                                       onclick="skipQuestions('f101a')" <?php echo set_radio('f101', '1'); ?>
                                                       required>
                                                ہاں<br>
                                                <input type="Radio" name="f101" onclick="showQuestions('f101a')"
                                                       value="2" id="f101n" <?php echo set_radio('f101', '2'); ?>
                                                       required>
                                                نہیں<br>
                                            </div>
                                        </div>
                                        <hr class="hr">
                                        <div class="row urdu f101a hide">
                                            <div class="col-md-12">
                                                <h4>
                                                    <small>f101a :</small>
                                                    آپ نے اپنے آخری حمل کے دوران (نام) کی پیدائش سے قبل معائنہ کیوں نہیں
                                                    کروایا تھا؟ ایک سے زیادہ جوابات آسکتے ہیں۔
                                                </h4>
                                                <input type="checkBox" name="f101aa" value="1"
                                                       id="f101aa" <?php echo set_checkbox('f101aa', '1'); ?>>
                                                سواری نہیں تھی <br>
                                                <input type="checkBox" name="f101ab" value="2"
                                                       id="f101ab" <?php echo set_checkbox('f101ab', '2'); ?>>
                                                ہسپتال کے عملے کا رویہ صحیح نہیں تھا <br>
                                                <input type="checkBox" name="f101ac" value="3"
                                                       id="f101ac" <?php echo set_checkbox('f101ac', '3'); ?>>
                                                ہسپتال میں کام نہیں ہو رہا تھا <br>
                                                <input type="checkBox" name="f101ad" value="4"
                                                       id="f101ad" <?php echo set_checkbox('f101d', '4'); ?>>
                                                مرکز صحت بہت دور تھا<br>
                                                <input type="checkBox" name="f101ae" value="5"
                                                       id="f101ae" <?php echo set_checkbox('f101e', '5'); ?>>
                                                کوئی مرد/شوہر مرکز صحت لے جانے کے لیئے موجود نہیں تھا<br>
                                                <input type="checkBox" name="f101af" value="6"
                                                       id="f101af" <?php echo set_checkbox('f101af', '6'); ?>>
                                                ناقص معیار کی خدمات <br>
                                                <input type="checkBox" name="f101ag" value="7"
                                                       id="f101ag" <?php echo set_checkbox('f101ag', '7'); ?>>
                                                مرکز صحت میں کوئی خاتون ڈاکٹر دستیاب نہیں<br>
                                                <input type="checkBox" name="f101ah" value="8"
                                                       id="f101ah" <?php echo set_checkbox('f101ah', '8'); ?>>
                                                ضروری نہیں سمجھا<br>
                                                <input type="checkBox" name="f101ai" value="9"
                                                       id="f101ai" <?php echo set_checkbox('f101ai', '9'); ?>>
                                                علاج مہنگا ہے <br>
                                                <input type="checkBox" name="f101aj" value="10"
                                                       id="f101aj" <?php echo set_checkbox('f101aj', '10'); ?>>
                                                ہسپتال کرونا کی وجہ سے بند تھا<br>
                                                <input type="checkBox" name="f101ak" value="11"
                                                       id="f101ak" <?php echo set_checkbox('f101ak', '11'); ?>>
                                                کرونا کا ڈریا خوف<br>
                                                <input type="checkBox" name="f101al" value="12"
                                                       id="f101al" <?php echo set_checkbox('f101al', '12'); ?>>
                                                سماجی مفاصلہ <br>
                                                <input type="checkBox" name="f101am" value="13"
                                                       id="f101am" <?php echo set_checkbox('f101am', '13'); ?>>
                                                کرونا کے لاک ڈائون کی وجہ سے سواری نہیں تھی br>
                                                <input type="checkBox" name="f101an" value="14"
                                                       id="f101an" <?php echo set_checkbox('f101an', '14'); ?>>
                                                حفاظتی سامان (ماسک، دستانے) گھر پر موجود نہیں تھے <br>
                                                <input type="checkBox" name="f101ao" value="15"
                                                       id="f101ao" <?php echo set_checkbox('f101ao', '15'); ?>>
                                                ڈاکٹر احتیاطی تدابیر پر عمل نہیں کر رہا تھا (ماسک اور دستانے نہیں
                                                پہنےہوئے
                                                تھے<br>

                                            </div>
                                        </div>
                                        <hr class="hr hide">
                                        <div class="row urdu">
                                            <div class="col-md-12">
                                                <h4>
                                                    <small>f121 :</small>
                                                    کیا گزشتہ حمل کے دوران(ایل ایچ ڈبلیو) لیڈی ہیلتھ ورکرنے آپ کے گھر کا
                                                    دورہ کیا تھا؟
                                                </h4>
                                                <input type="Radio" name="f121" value="1" id="f121a"
                                                    <?php echo set_radio('f121', '1'); ?> required>
                                                ہاں <br>
                                                <input type="Radio" name="f121" value="2"
                                                       id="f121b" <?php echo set_radio('f121', '2'); ?> required>
                                                نہیں <br>
                                            </div>
                                        </div>
                                        <hr class="hr">
                                        <div class="row urdu">
                                            <div class="col-md-12">
                                                <h4>
                                                    <small>f121a :</small>
                                                    کیا گزشتہ حمل کے دوران(ایل ایچ ڈبلیو) لیڈی ہیلتھ ورکرنے کرونا کی وبا
                                                    کے
                                                    دوران آپ کے گھر کا دورہ کیا تھا
                                                </h4>
                                                <input type="Radio" name="f121a" <?php echo set_radio('f121a', '1'); ?>
                                                       onclick="skipQuestions('f121b')"
                                                       value="1" id="f121aa" required>
                                                ہاں <br>
                                                <input type="Radio" name="f121a" <?php echo set_radio('f121a', '2'); ?>
                                                       onclick="showQuestions('f121b')"
                                                       value="2" id="f121ab" required>
                                                نہیں <br>
                                            </div>
                                        </div>
                                        <hr class="hr">
                                        <div class="row urdu hide f121b">
                                            <div class="col-md-12">
                                                <h4>
                                                    <small>f121b :</small>
                                                    لیڈی ہیلتھ ورکر کا وزٹ نہیں کرنے کا سبب کیا تھاا
                                                </h4>
                                                <input type="checkbox" name="f121ba" value="1"
                                                       id="f121ba" <?php echo set_checkbox('f121ba', '1'); ?>>
                                                ایل ایچھ ڈبلیو اکثر وزت پرنہیں آتی <br>
                                                <input type="checkbox" name="f121bb" value="2"
                                                       id="f121bb" <?php echo set_checkbox('f121bb', '2'); ?>>
                                                ایل ایچھ ڈبلیوکرونا کی وجہ سےوزٹ نہیں کرسکی <br>
                                                <input type="checkbox" name="f121bc" value="3" id="f121bc"
                                                    <?php echo set_checkbox('f121bc', '3'); ?>
                                                       onclick="select3options(this, 'f121bc')">ایل
                                                ایچھ
                                                ڈبلیوآئی
                                                مگر ہم نے گھر میں
                                                آنے نہیں دیا <br>
                                                <div class="childHide hide">
                                                    <input type="checkbox" name="f121bd" value="31" id="f121bd"
                                                        <?php echo set_checkbox('f121bd', '31'); ?>> ایل
                                                    ایچھ
                                                    ڈبلیونے
                                                    ماسک نہیں پہنا ہوا
                                                    تھا
                                                    <br>
                                                    <input type="checkbox" name="f121be" value="32" id="f121be"
                                                        <?php echo set_checkbox('f121be', '32'); ?>> کرونا
                                                    کا
                                                    ڈریا
                                                    خوف <br>
                                                    <input type="checkbox" name="f121bf" value="33" id="f121bf"
                                                        <?php echo set_checkbox('f121be', '33'); ?>>سماجی
                                                    مفاصلا
                                                    <br>
                                                    <input type="checkbox" name="f121bg" value="34" id="f121bg"
                                                        <?php echo set_checkbox('f121bg', '34'); ?>>حفاظتی
                                                    سامان
                                                    گھر
                                                    پر موجود نہیں تھا
                                                    <br>
                                                </div>

                                            </div>
                                        </div>
                                        <hr class="hr hide">

                                        <div class="row urdu">
                                            <div class="col-md-12">
                                                <h4>
                                                    <small>f129 :</small>
                                                    کیا آپ نے اوپر بیان کی گئیں خطرناک علامات /مسائل کی دیکھ بھال کے لئے
                                                    علاج کروایا تھا؟
                                                </h4>
                                                <input type="Radio" <?php echo set_radio('f129', '1'); ?> name="f129"
                                                       onclick="skipQuestions('f130')"
                                                       value="1" id="f129a" required>
                                                ہاں <br>
                                                <input type="Radio" name="f129" <?php echo set_radio('f129', '2'); ?>
                                                       onclick="showQuestions('f130')"
                                                       value="2" id="f129b" required>
                                                نہیں <br>
                                            </div>
                                        </div>
                                        <hr class="hr">
                                        <div class="row urdu f130 hide">
                                            <div class="col-md-12">
                                                <h4>
                                                    <small>f130 :</small>
                                                    آپ(نام)کی پیدائش سےقبل حمل کے دوران پیش آنے والیخطرناک علامات/مسائل
                                                    کی
                                                    دیکھ بھال کے لئے کسی صحت کی سہولیات فراہم کرنے والے کے پاس کیوں نہیں
                                                    گئیں؟ سب پر نشان لگائیں جو لاگو ہوتے ہیں
                                                </h4>
                                                <input type="checkBox" name="f130a" value="1" id="f130a"
                                                    <?php echo set_checkbox('f130a', '1'); ?>>
                                                سواری نہیں تھی <br>
                                                <input type="checkBox" name="f130b" value="2" id="f130b"
                                                    <?php echo set_checkbox('f130b', '2'); ?>>
                                                ہسپتال کے عملے کا رویہ صحیح نہیں تھا <br>
                                                <input type="checkBox" name="f130c" value="3"
                                                       id="f130c" <?php echo set_checkbox('f130c', '3'); ?>>
                                                ہسپتال میں کام نہیں ہو رہا تھا <br>
                                                <input type="checkBox"
                                                       name="f130d" <?php echo set_checkbox('f130d', '4'); ?>
                                                       value="4" id="f130d">
                                                مرکز صحت بہت دور تھا<br>
                                                <input type="checkBox"
                                                       name="f130e" <?php echo set_checkbox('f130e', '5'); ?>
                                                       value="5" id="f130e">
                                                کوئی مرد/شوہر مرکز صحت لے جانے کے لیئے موجود نہیں تھا<br>
                                                <input <?php echo set_checkbox('f130f', '6'); ?>
                                                        type="checkBox" name="f130f"
                                                        value="6" id="f130f">
                                                ناقص معیار کی خدمات<br>
                                                <input type="checkBox"
                                                       name="f130g" <?php echo set_checkbox('f130g', '7'); ?>
                                                       value="7" id="f130g">
                                                مرکز صحت میں کوئی خاتون ڈاکٹر دستیاب نہیں<br>
                                                <input type="checkBox" <?php echo set_checkbox('f130h', '8'); ?>
                                                       name="f130h"
                                                       value="8" id="f130h">
                                                ضروری نہیں سمجھا<br>
                                                <input type="checkBox"
                                                       name="f130i" <?php echo set_checkbox('f130i', '9'); ?>
                                                       value="9" id="f130i">
                                                علاج مہنگا ہے<br>
                                                <input type="checkBox" name="f130j" value="10"
                                                       id="f130j" <?php echo set_checkbox('f130j', '10'); ?>>
                                                ہسپتال کرونا کی وجہ سے بند تھا<br>
                                                <input type="checkBox" name="f130k" value="11"
                                                       id="f130k" <?php echo set_checkbox('f130k', '11'); ?>>
                                                کرونا کا ڈریا خوف<br>
                                                <input type="checkBox" name="f130l" value="12"
                                                       id="f130l" <?php echo set_checkbox('f130l', '12'); ?>>
                                                سماجی مفاصلہ <br>
                                                <input type="checkBox" name="f130m" value="13"
                                                       id="f130m" <?php echo set_checkbox('f130m', '13'); ?>>
                                                کرونا کے لاک ڈائون کی وجہ سے سواری نہیں تھی br>
                                                <input type="checkBox" name="f130n" value="14"
                                                       id="f130n" <?php echo set_checkbox('f130n', '14'); ?>>
                                                حفاظتی سامان (ماسک، دستانے) گھر پر موجود نہیں تھے <br>
                                                <input type="checkBox" name="f130o" value="15"
                                                       id="f130o" <?php echo set_checkbox('f130o', '15'); ?>>
                                                ڈاکٹر احتیاطی تدابیر پر عمل نہیں کر رہا تھا (ماسک اور دستانے نہیں
                                                پہنےہوئے
                                                تھے<br>
                                            </div>
                                        </div>
                                        <hr class="hr hide">

                                        <div class="row urdu">
                                            <div class="col-md-12">
                                                <h4>
                                                    <small>f134 :</small>
                                                    (نام) کی پیدائش کے لئے آپ نے کیا اقدامات کئے تھے؟ جوابات پڑھیں، ایک
                                                    سے
                                                    زیادہ جوابات آ سکتے ہیں
                                                </h4>
                                                <input type="checkBox"
                                                       name="f134a" <?php echo set_checkbox('f134a', '1'); ?>
                                                       value="1" id="f134a">
                                                دائی کا انتخاب<br>
                                                <input type="checkBox"
                                                       name="f134b" <?php echo set_checkbox('f134b', '2'); ?>
                                                       value="2" id="f134b">
                                                کسی بھی پیچیدگی کی صورت میں مرکز صحت جانےکا انتخاب <br>
                                                <input
                                                        type="checkBox"
                                                        name="f134c" <?php echo set_checkbox('f134c', '3'); ?>
                                                        value="3" id="f134c">
                                                کسی بھی ایمرجنسی سے نمٹنے کے لئے پیسوں کا بندوبست<br>
                                                <input type="checkBox"
                                                       name="f134d" <?php echo set_checkbox('f134d', '4'); ?>
                                                       value="4"
                                                       id="f134d">
                                                وقت سے پہلے گاڑی کا بندوبست<br>
                                                <input type="checkBox"
                                                       name="f134e" <?php echo set_checkbox('f134e', '5'); ?>
                                                       value="5" id="f134e">
                                                کلین ڈیلیوری کٹ کا بندوبست <br>
                                                <input type="checkBox"
                                                       name="f134f" <?php echo set_checkbox('f134f', '6'); ?>
                                                       value="6" id="f134f">
                                                خون کابندوبست<br>
                                                <input type="checkBox"
                                                       name="f134g" <?php echo set_checkbox('f134g', '7'); ?>
                                                       value="7" id="f134g">
                                                کوئی اقدامات یا تیاری نہیں کی تھی<br>
                                                <input type="checkBox"
                                                       name="f134h" <?php echo set_checkbox('f134h', '8'); ?>
                                                       value="8" id="f134h">
                                                کرونا کی وجہ سےکوئی تیاری نہیں کی<br>
                                            </div>
                                        </div>
                                        <hr class="hr">


                                        <p class="myheading"> سیکشن جی: زچگی کی
                                            تیاری اور تجربات
                                        </p>
                                        <p class="myheading2">اب میں آپ سے آپ کی آخری (حالیہ)زچگی کی گزشتہ معلومات اوراس
                                            کی
                                            تیاری کے بارے میں
                                            کچھ سوال کرنا چاہتا/چاہتی ہوں</p>

                                        <div class="row urdu">
                                            <div class="col-md-12">
                                                <h4>
                                                    <small>g102 :</small>
                                                    (نام) کی پیدائش کہاں ہوئی تھی؟
                                                </h4>
                                                <input type="Radio" <?php echo set_radio('g102', '1'); ?> name="g102"
                                                       onclick="showQuestions('g103')"
                                                       value="1" id="g102a" required>
                                                گھر پر
                                                <br>
                                                <input type="Radio" <?php echo set_radio('g102', '2'); ?> name="g102"
                                                       onclick="skipQuestions('g103')"
                                                       value="2" id="g102b" required>
                                                سرکاری مرکز صحت
                                                <br>
                                                <input type="Radio" <?php echo set_radio('g102', '3'); ?> name="g102"
                                                       onclick="skipQuestions('g103')"
                                                       value="3" id="g102c" required>
                                                نجی مرکز صحت
                                                <br>
                                                <input type="Radio" <?php echo set_radio('g102', '4'); ?> name="g102"
                                                       onclick="skipQuestions('g103')"
                                                       value="4" id="g102d" required>
                                                رفاہی ادارہ یا مرکز صحت
                                                <br>
                                                <input type="Radio" <?php echo set_radio('g102', '5'); ?> name="g102"
                                                       onclick="skipQuestions('g103')"
                                                       value="5" id="g102e" required>
                                                مرکز صحت جاتے ہوئے راستے میں
                                                <br>
                                                <input type="Radio" <?php echo set_radio('g102', '6'); ?> name="g102"
                                                       onclick="skipQuestions('g103')"
                                                       value="6" id="g102f" required>
                                                Birth stationمیٹرنیٹی ہوم
                                                <br>
                                            </div>
                                        </div>
                                        <hr class="hr">
                                        <div class="row urdu">
                                            <div class="col-md-12">
                                                <h4>
                                                    <small>e106 :</small>
                                                    کس مہینے اور سال میں (نام) کی پیدائش ہوئی تھی؟

                                                    مزید پوچھیں: اس بچہ/بچی کی سالگرہ کب ہوتی ہے؟
                                                    Date of delivery

                                                </h4>
                                                <label for="e106a">دن </label>
                                                <select id="e106a" name="e106a" style="width: 15%; margin-bottom: 10px"
                                                        required>
                                                    <option value="0">دن</option>
                                                    <?php for ($d = 1; $d <= 31; $d++) {
                                                        echo '<option value="' . $d . '">' . $d . '</option>';
                                                    } ?>
                                                </select>
                                                <!--<input type="input" name="e106a" maxlength="2" min="0" max="31"
                                                       id="e106a"
                                                       required>-->
                                                <br>
                                                <label for="e106b">مہینہ </label>
                                                <select id="e106b" name="e106b" required
                                                        style="width: 15%; margin-bottom: 10px">
                                                    <option value="0">مہینہ</option>
                                                    <?php for ($m = 1; $m <= 12; $m++) {
                                                        echo '<option value="' . $m . '">' . $m . '</option>';
                                                    } ?>
                                                </select>
                                                <!--<input type="input" max="12" name="e106b" maxlength="2" min="0"
                                                       id="e106b"
                                                       required>
                                                مہینہ-->
                                                <br>
                                                <label for="e106c">سال </label>
                                                <select id="e106c" name="e106c" required
                                                        style="width: 15%; margin-bottom: 10px">
                                                    <option value="0">سال</option>
                                                    <?php for ($y = 2010; $y <= 2020; $y++) {
                                                        echo '<option value="' . $y . '">' . $y . '</option>';
                                                    } ?>
                                                </select>
                                                <!--<input type="input" name="e106c" maxlength="4" id="e106c" min="0"
                                                       required>
                                                سال-->
                                                <br>

                                            </div>
                                        </div>
                                        <hr class="hr">
                                        <div class="row urdu g103 hide">
                                            <div class="col-md-12">
                                                <h4>
                                                    <small>g103 :</small>
                                                    آپ نے (نام) کی پیدائش مرکز صحت پر کیوں نہیں کروائی؟ اگر زچگی گھر میں
                                                    ہوئی تھی۔ کسی
                                                    اور وجہ کی نشاندہی کرنے کے لئے تحقیق کریں۔ بتائے گئے تمام جوابات
                                                    ریکارڈ
                                                    کریں۔
                                                </h4>
                                                <input type="checkBox" name="g103a"
                                                    <?php echo set_checkbox('g103a', '1'); ?>
                                                       value="1" id="g103a">
                                                سواری نہیں تھی
                                                <br>
                                                <input type="checkBox"
                                                       name="g103b" <?php echo set_checkbox('g103b', '2'); ?>
                                                       value="2" id="g103b">
                                                ہسپتال کے عملے کا رویہ صحیح نہیں تھا
                                                <br>
                                                <input type="checkBox"
                                                       name="g103c" <?php echo set_checkbox('g103c', '3'); ?>
                                                       value="3" id="g103c">
                                                ہسپتال میں کام نہیں ہو رہا تھا
                                                <br>
                                                <input type="checkBox"
                                                       name="g103d" <?php echo set_checkbox('g103d', '4'); ?>
                                                       value="4" id="g103d">
                                                مرکز صحت بہت دور تھا
                                                <br>
                                                <input type="checkBox"
                                                       name="g103e" <?php echo set_checkbox('g103e', '5'); ?>
                                                       value="5" id="g103e">
                                                کوئی مرد/شوہر مرکز صحت لے جانے کے لیئے موجود نہیں تھا
                                                <br>
                                                <input type="checkBox"
                                                       name="g103f" <?php echo set_checkbox('g103f', '6'); ?>
                                                       value="6" id="g103f">
                                                ناقص معیار کی خدمات
                                                <br>
                                                <input type="checkBox"
                                                       name="g103g" <?php echo set_checkbox('g103g', '7'); ?>
                                                       value="7" id="g103g">
                                                مرکز صحت میں کوئی خاتون ڈاکٹر دستیاب نہیں
                                                <br>
                                                <input type="checkBox"
                                                       name="g103h" <?php echo set_checkbox('g103h', '8'); ?>
                                                       value="8" id="g103h">
                                                ضروری نہیں سمجھا
                                                <br>
                                                <input type="checkBox"
                                                       name="g103i" <?php echo set_checkbox('g103i', '9'); ?>
                                                       value="9" id="g103i">
                                                علاج مہنگا ہے
                                                <br>
                                                <input type="checkBox"
                                                       name="g103j" <?php echo set_checkbox('g103j', '10'); ?>
                                                       value="10" id="g103j">
                                                ہسپتال کرونا کی وجہ سے بند تھا<br>
                                                <input type="checkBox"
                                                       name="g103k" <?php echo set_checkbox('g103k', '11'); ?>
                                                       value="11" id="g103k">
                                                کرونا کا ڈریا خوف<br>
                                                <input type="checkBox"
                                                       name="g103l" <?php echo set_checkbox('g103l', '12'); ?>
                                                       value="12" id="g103l">
                                                سماجی مفاصلہ <br>
                                                <input type="checkBox"
                                                       name="g103m" <?php echo set_checkbox('g103m', '13'); ?>
                                                       value="13" id="g103m">
                                                کرونا کے لاک ڈائون کی وجہ سے سواری نہیں تھی br>
                                                <input type="checkBox"
                                                       name="g103n" <?php echo set_checkbox('g103n', '14'); ?>
                                                       value="14" id="g103n">
                                                حفاظتی سامان (ماسک، دستانے) گھر پر موجود نہیں تھے <br>
                                                <input type="checkBox"
                                                       name="g103o" <?php echo set_checkbox('g103o', '15'); ?>
                                                       value="15" id="g103o">
                                                ڈاکٹر احتیاطی تدابیر پر عمل نہیں کر رہا تھا (ماسک اور دستانے نہیں
                                                پہنےہوئے
                                                تھے<br>
                                            </div>
                                        </div>
                                        <hr class="hr hide">

                                        <div class="row urdu">
                                            <div class="col-md-12">
                                                <h4>
                                                    <small>g125 :</small>
                                                    کیاآپ کےبچے
                                                    کی پیدائش کے وقت
                                                    ایل-ایچ-ڈبلیو موجود
                                                    تھی؟
                                                </h4>
                                                <input type="Radio" onclick="skipQuestions('g125a')"
                                                    <?php echo set_radio('g125', '1'); ?>
                                                       name="g125" value="1" id="g125a" required>
                                                ہاں
                                                <br>
                                                <input type="Radio" onclick="showQuestions('g125a')"
                                                    <?php echo set_radio('g125', '2'); ?>
                                                       name="g125" value="2" id="g125b"
                                                       required>
                                                نہیں
                                                <br>
                                            </div>
                                        </div>
                                        <hr class="hr">
                                        <div class="row urdu g125a hide">
                                            <div class="col-md-12">
                                                <h4>
                                                    <small>g125a :</small>
                                                    لیڈی ہیلتھ ورکر کا وزٹ نہیں کرنے کا سبب کیا تھاا
                                                </h4>
                                                <input type="checkbox" name="g125aa"
                                                       value="1" id="g125aa">
                                                ایل ایچھ ڈبلیو اکثر وزت پرنہیں آتی <br>
                                                <input type="checkbox" name="g125ab"
                                                       value="2" id="g125ab">
                                                ایل ایچھ ڈبلیوکرونا کی وجہ سےوزٹ نہیں کرسکی <br>
                                                <input type="checkbox" name="g125ac"
                                                       onclick="select3options(this,'g125ac')"
                                                       value="3" id="g125ac">ایل ایچھ ڈبلیوآئی مگر ہم نے گھر میں
                                                آنے نہیں دیا <br>
                                                <div class="childHide hide">
                                                    <input type="checkbox" name="g125ad"
                                                           value="31" id="g125ad"> ایل ایچھ ڈبلیونے ماسک نہیں پہنا ہوا
                                                    تھا
                                                    <br>
                                                    <input type="checkbox" name="g125ae"
                                                           value="32" id="g125ae"> کرونا کا ڈریا خوف <br>
                                                    <input type="checkbox" name="g125af"
                                                           value="33" id="g125af">سماجی مفاصلا <br>
                                                    <input type="checkbox" name="g125ag"
                                                           value="34" id="g125ag">حفاظتی سامان گھر پر موجود نہیں تھا
                                                    <br>
                                                </div>

                                            </div>
                                        </div>
                                        <hr class="hr hide">

                                        <p class="myheading">
                                            سیکشن ایچ :
                                            نوزائیدہ کی صحت
                                        </p>
                                        <p class="myheading2">اگلے سیکشن میں، آپ سے میں آپ کے نوزائیدہ بچے کی صحت سے
                                            متعلق
                                            چند سوال کروں
                                            گی</p>

                                        <div class="row urdu">
                                            <div class="col-md-12">
                                                <h4>
                                                    <small>h125 :</small>
                                                    اب میں (نام) ولادت کے بعد کیئے گیئے صحت کے معائنے سے متعلق کچھ
                                                    سوالات
                                                    پوچھونگی۔ (نام) کی پیدائش کے بعد، کیا کسی نے (نام) کی صحت کا معائنہ
                                                    کیا
                                                    تھا؟
                                                </h4>
                                                <input type="Radio" name="h125" onclick="skipQuestions('h125a')"
                                                    <?php echo set_radio('h125', '1'); ?>
                                                       value="1" id="h125a" required>
                                                ہاں <br>
                                                <input type="Radio" name="h125" onclick="showQuestions('h125a')"
                                                    <?php echo set_radio('h125', '2'); ?>
                                                       value="2" id="h125b" required>
                                                نہیں <br></div>
                                        </div>
                                        <hr class="hr">
                                        <div class="row urdu h125a hide">
                                            <div class="col-md-12">
                                                <h4>
                                                    <small>h125a :</small>
                                                    آپ نے (نام) کی پیدائش مرکز صحت پر کیوں نہیں کروائی؟ اگر زچگی گھر میں
                                                    ہوئی تھی۔ کسی
                                                    اور وجہ کی نشاندہی کرنے کے لئے تحقیق کریں۔ بتائے گئے تمام جوابات
                                                    ریکارڈ
                                                    کریں۔
                                                </h4>
                                                <input type="checkBox"
                                                       name="h125aa" <?php echo set_checkbox('h125aa', '1'); ?>
                                                       value="1" id="h125aa">
                                                سواری نہیں تھی
                                                <br>
                                                <input type="checkBox"
                                                       name="h125ab" <?php echo set_checkbox('h125ab', '2'); ?>
                                                       value="2" id="h125ab">
                                                ہسپتال کے عملے کا رویہ صحیح نہیں تھا
                                                <br>
                                                <input type="checkBox"
                                                       name="h125ac" <?php echo set_checkbox('h125ac', '3'); ?>
                                                       value="3" id="h125ac">
                                                ہسپتال میں کام نہیں ہو رہا تھا
                                                <br>
                                                <input type="checkBox"
                                                       name="h125ad" <?php echo set_checkbox('h125ad', '4'); ?>
                                                       value="4" id="h125ad">
                                                مرکز صحت بہت دور تھا
                                                <br>
                                                <input type="checkBox"
                                                       name="h125ae" <?php echo set_checkbox('h125ae', '5'); ?>
                                                       value="5" id="h125ae">
                                                کوئی مرد/شوہر مرکز صحت لے جانے کے لیئے موجود نہیں تھا
                                                <br>
                                                <input type="checkBox"
                                                       name="h125af" <?php echo set_checkbox('h125af', '6'); ?>
                                                       value="6" id="h125af">
                                                ناقص معیار کی خدمات
                                                <br>
                                                <input type="checkBox"
                                                       name="h125ag" <?php echo set_checkbox('h125ag', '7'); ?>
                                                       value="7" id="h125ag">
                                                مرکز صحت میں کوئی خاتون ڈاکٹر دستیاب نہیں
                                                <br>
                                                <input type="checkBox"
                                                       name="h125ah" <?php echo set_checkbox('h125ah', '8'); ?>
                                                       value="8" id="h125ah">
                                                ضروری نہیں سمجھا
                                                <br>
                                                <input type="checkBox"
                                                       name="h125ai" <?php echo set_checkbox('h125ai', '9'); ?>
                                                       value="9" id="h125ai">
                                                علاج مہنگا ہے
                                                <br>
                                                <input type="checkBox" name="h125aj" value="10"
                                                       id="h125aj" <?php echo set_checkbox('h125aj', '10'); ?>>
                                                ہسپتال کرونا کی وجہ سے بند تھا<br>
                                                <input type="checkBox" name="h125ak" value="11"
                                                       id="h125ak" <?php echo set_checkbox('h125ak', '11'); ?>>
                                                کرونا کا ڈریا خوف<br>
                                                <input type="checkBox" name="h125al" value="12"
                                                       id="h125al" <?php echo set_checkbox('h125al', '12'); ?>>
                                                سماجی مفاصلہ <br>
                                                <input type="checkBox" name="h125am" value="13"
                                                       id="h125am" <?php echo set_checkbox('h125am', '13'); ?>>
                                                کرونا کے لاک ڈائون کی وجہ سے سواری نہیں تھی br>
                                                <input type="checkBox" name="h125an" value="14"
                                                       id="h125an" <?php echo set_checkbox('h125an', '14'); ?>>
                                                حفاظتی سامان (ماسک، دستانے) گھر پر موجود نہیں تھے <br>
                                                <input type="checkBox" name="h125ao" value="15"
                                                       id="h125ao" <?php echo set_checkbox('h125ao', '15'); ?>>
                                                ڈاکٹر احتیاطی تدابیر پر عمل نہیں کر رہا تھا (ماسک اور دستانے نہیں
                                                پہنےہوئے
                                                تھے<br>
                                            </div>
                                        </div>
                                        <hr class="hr hide">
                                        <div class="row urdu">
                                            <div class="col-md-12">
                                                <h4>
                                                    <small>h131 :</small>
                                                    کیا آپ(نام) کو حفاظتی ٹیکوں کے لیے لے کر گئی تھیں؟
                                                </h4>
                                                <input type="Radio" name="h131" onclick="skipQuestions('h131a')"
                                                    <?php echo set_radio('h131', '1'); ?>
                                                       value="1" id="h131a" required>
                                                ہاں <br>
                                                <input type="Radio" name="h131" onclick="showQuestions('h131a')"
                                                    <?php echo set_radio('h131', '2'); ?>
                                                       value="2" id="h131b" required>
                                                نہیں <br></div>
                                        </div>
                                        <hr class="hr">
                                        <div class="row urdu h131a hide">
                                            <div class="col-md-12">
                                                <h4>
                                                    <small>h131a :</small>
                                                    کیا آپ(نام) کو حفاظتی ٹیکوں کے لیے لے کر گئی تھیں؟
                                                </h4>
                                                <input type="checkbox"
                                                       name="h131aa" <?php echo set_checkbox('h131aa', '1'); ?>
                                                       value="1" id="h131aa">
                                                اتنا اہم نہیں تھا <br>
                                                <input type="checkbox"
                                                       name="h131ab" <?php echo set_checkbox('h131ab', '2'); ?>
                                                       value="2" id="h131ab">
                                                ہسپتال کرونا کی وجہ سے بند تھ <br>
                                                <input type="checkbox"
                                                       name="h131ac" <?php echo set_checkbox('h131ac', '3'); ?>
                                                       value="3" id="h131ac">
                                                کرونا کا ڈریا خوف <br>
                                                <input type="checkbox"
                                                       name="h131ad" <?php echo set_checkbox('h131ad', '4'); ?>
                                                       value="4" id="h131ad">
                                                سماجی مفاصلہ <br>
                                                <input type="checkbox"
                                                       name="h131ae" <?php echo set_checkbox('h131ae', '5'); ?>
                                                       value="5" id="h131ae">
                                                کرونا کے لاک ڈائون کی وجہ سے سواری نہیں تھی <br>
                                                <input type="checkbox"
                                                       name="h131af" <?php echo set_checkbox('h131af', '6'); ?>
                                                       value="6" id="h131af">
                                                حفاظتی سامان (ماسک، دستانے) گھر پر موجود نہیں تھے <br>
                                                <input type="checkbox"
                                                       name="h131ag" <?php echo set_checkbox('h131ag', '7'); ?>
                                                       value="7" id="h131ag">
                                                ڈاکٹر احتیاطی تدابیر پر عمل نہیں کر رہا تھا (ماسک اور دستانے نہیں
                                                پہنےہوئے
                                                تھے) <br>

                                            </div>
                                        </div>
                                        <hr class="hr hide">
                                        <div class="row urdu">
                                            <div class="col-md-12">
                                                <h4>
                                                    <small>h132 :</small>
                                                    کیانوزائیدہ کی پیدائش کے بعد ایل ایچ ڈبلیو نے دورہ کیا تھا ؟
                                                </h4>
                                                <input type="Radio" name="h132" onclick="skipQuestions('h132a')"
                                                    <?php echo set_radio('h132', '1'); ?>
                                                       value="1" id="h132a" required>
                                                ہاں <br>
                                                <input type="Radio" name="h132" onclick="showQuestions('h132a')"
                                                    <?php echo set_radio('h132', '2'); ?>
                                                       value="2" id="h132b" required>
                                                نہیں <br>
                                                <input type="Radio" name="h132" onclick="showQuestions('h132a')"
                                                    <?php echo set_radio('h132', '3'); ?>
                                                       value="3" id="h132c" required>
                                                زچگی کسی اور علاقہ میں ہوئی تھی<br></div>
                                        </div>
                                        <hr class="hr">
                                        <div class="row urdu h132a hide">
                                            <div class="col-md-12">
                                                <h4>
                                                    <small>h132a :</small>
                                                    لیڈی ہیلتھ ورکر کا وزٹ نہیں کرنے کا سبب کیا تھا؟
                                                </h4>
                                                <input type="checkbox"
                                                       name="h132aa" <?php echo set_checkbox('h132aa', '1'); ?>
                                                       value="1" id="h132aa">
                                                ایل ایچھ ڈبلیو اکثر وزت پرنہیں آتی <br>
                                                <input type="checkbox"
                                                       name="h132ab" <?php echo set_checkbox('h132ab', '2'); ?>
                                                       value="2" id="h132ab">
                                                ایل ایچھ ڈبلیوکرونا کی وجہ سےوزٹ نہیں کرسکی <br>
                                                <input type="checkbox"
                                                       name="h132ac" <?php echo set_checkbox('h132ac', '3'); ?>
                                                       onclick="select3options(this, 'h132ac')"
                                                       value="3" id="h132ac">ایل ایچھ ڈبلیوآئی مگر ہم نے گھر میں
                                                آنے نہیں دیا <br>
                                                <div class="childHide hide">
                                                    <input type="checkbox"
                                                           name="h132ad" <?php echo set_checkbox('h132ad', '31'); ?>
                                                           value="31" id="h132ad"> ایل ایچھ ڈبلیونے ماسک نہیں پہنا ہوا
                                                    تھا
                                                    <br>
                                                    <input type="checkbox"
                                                           name="h132ae" <?php echo set_checkbox('h132ae', '32'); ?>
                                                           value="32" id="h132ae"> کرونا کا ڈریا خوف <br>
                                                    <input type="checkbox"
                                                           name="h132af" <?php echo set_checkbox('h132af', '33'); ?>
                                                           value="33" id="h132af">سماجی مفاصلا <br>
                                                    <input type="checkbox"
                                                           name="h132ag" <?php echo set_checkbox('h132ag', '34'); ?>
                                                           value="34" id="h132ag">حفاظتی سامان گھر پر موجود نہیں تھا
                                                    <br>
                                                </div>

                                            </div>
                                        </div>
                                        <hr class="hr hide">
                                        <div class="row urdu">
                                            <div class="col-md-12">
                                                <h4>
                                                    <small>h133 :</small>
                                                    لیڈی ہیلتھ ورکر کا (نام) کی ولادت کے بعد آنے کا مقصد کیا تھا؟
                                                </h4>
                                                <input type="checkBox"
                                                       name="h133a" <?php echo set_checkbox('h133a', '1'); ?>
                                                       value="1" id="h133a">
                                                وزن کیاتھا<br>
                                                <input type="checkBox"
                                                       name="h133b" <?php echo set_checkbox('h133b', '2'); ?>
                                                       value="2" id="h133b">
                                                (معائنہ کیا (درجہ حرارت ، سانس کی رفتار، صحت کے بارے میں آگاہی<br>
                                                <input
                                                        type="checkBox"
                                                        name="h133c" <?php echo set_checkbox('h133c', '3'); ?>
                                                        value="3" id="h133c">
                                                صحت و صفائی اور خوراک کے بارے میں بتایا<br>
                                                <input type="checkBox" <?php echo set_checkbox('h133d', '4'); ?>
                                                       name="h133d"
                                                       value="4" id="h133d">
                                                معمول کے معائنہ کے لئے مرکزِ صحت ریفر کیا<br>
                                                <input type="checkBox"
                                                       name="h133e" <?php echo set_checkbox('h133e', '5'); ?>
                                                       value="5"
                                                       id="h133e">
                                                حفاظتی ٹیکے<br>
                                                <input type="checkBox"
                                                       name="h133f" <?php echo set_checkbox('h133f', '6'); ?>
                                                       value="6" id="h133f">
                                                پولیو کے قطرے پلوائے<br>
                                                <input type="checkBox"
                                                       name="h133g" <?php echo set_checkbox('h133g', '7'); ?>
                                                       value="7" id="h133g">
                                                ماں کو دودھ پلانے کا صحیح طریقہ بتایا<br>
                                                <input type="checkBox"
                                                       name="h133h" <?php echo set_checkbox('h133h', '8'); ?>
                                                       value="8" id="h133h">
                                                خطرناک علامات کے بارے میں بتایا<br>
                                                <input type="checkBox"
                                                       name="h133i" <?php echo set_checkbox('h133i', '9'); ?>
                                                       value="9" id="h133i">
                                                کرونا کی احتیاطی تدابیر کےبارے میں معلومات <br>
                                            </div>
                                        </div>
                                        <hr class="hr">

                                        <div class="row urdu">
                                            <div class="col-md-12">
                                                <h4>
                                                    <small>h137 :</small>
                                                    کیانام کو پیدائش کے بعد بی-سی-جی کا ٹیکہ لگا تھا؟ (عموماً بائیں
                                                    بازو
                                                    پر ٹیکے کا داغ رہ جاتا ہے)
                                                </h4>
                                                <input type="Radio" name="h137" onclick="skipQuestions('h137aa')"
                                                    <?php echo set_radio('h137', '1'); ?>
                                                       value="1" id="h137a" required>
                                                ہاں <br>
                                                <input type="Radio" name="h137" onclick="showQuestions('h137aa')"
                                                    <?php echo set_radio('h137', '2'); ?>
                                                       value="2" id="h137b" required>
                                                نہیں <br></div>
                                        </div>
                                        <hr class="hr">
                                        <div class="row urdu h137aa hide">
                                            <div class="col-md-12">
                                                <h4>
                                                    <small>h137a :</small>
                                                    کیا آپ(نام) کو حفاظتی ٹیکےکیوں نہیں لگوائے؟
                                                </h4>
                                                <input type="checkbox"
                                                       name="h137aa" <?php echo set_checkbox('h137aa', '1'); ?>
                                                       value="1" id="h137aa">
                                                اتنا اہم نہیں تھا <br>
                                                <input type="checkbox"
                                                       name="h137ab" <?php echo set_checkbox('h137ab', '2'); ?>
                                                       value="2" id="h137ab">
                                                ہسپتال کرونا کی وجہ سے بند تھ <br>
                                                <input type="checkbox"
                                                       name="h137ac" <?php echo set_checkbox('h137ac', '3'); ?>
                                                       value="3" id="h137ac">
                                                کرونا کا ڈریا خوف <br>
                                                <input type="checkbox"
                                                       name="h137ad" <?php echo set_checkbox('h137ad', '4'); ?>
                                                       value="4" id="h137ad">
                                                سماجی مفاصلہ <br>
                                                <input type="checkbox"
                                                       name="h137ae" <?php echo set_checkbox('h137ae', '5'); ?>
                                                       value="5" id="h137ae">
                                                کرونا کے لاک ڈائون کی وجہ سے سواری نہیں تھی <br>
                                                <input type="checkbox"
                                                       name="h137af" <?php echo set_checkbox('h137af', '6'); ?>
                                                       value="6" id="h137af">
                                                حفاظتی سامان (ماسک، دستانے) گھر پر موجود نہیں تھے <br>
                                                <input type="checkbox"
                                                       name="h137ag" <?php echo set_checkbox('h137ag', '7'); ?>
                                                       value="7" id="h137ag">
                                                ڈاکٹر احتیاطی تدابیر پر عمل نہیں کر رہا تھا (ماسک اور دستانے نہیں
                                                پہنےہوئے
                                                تھے) <br>

                                            </div>
                                        </div>
                                        <hr class="hr hide">

                                        <div class="row urdu">
                                            <div class="col-md-12">
                                                <h4>
                                                    <small>h209 :</small>
                                                    کیا لیڈی ہیلتھ ورکر نےزچگی کے بعد آپ کے پاس دورہ کیا تھا؟
                                                </h4>
                                                <input type="Radio" name="h209"
                                                    <?php echo set_radio('h209', '1'); ?>
                                                       onclick="skipQuestions('h209aa')"
                                                       value="1" id="h209a" required>
                                                ہاں <br>
                                                <input type="Radio" name="h209"
                                                    <?php echo set_radio('h209', '2'); ?>
                                                       onclick="showQuestions('h209aa')"
                                                       value="2" id="h209b" required>
                                                نہیں <br></div>
                                        </div>
                                        <hr class="hr">
                                        <div class="row urdu h209aa hide">
                                            <div class="col-md-12">
                                                <h4>
                                                    <small>h209a :</small>
                                                    لیڈی ہیلتھ ورکر کا وزٹ نہیں کرنے کا سبب کیا تھا؟
                                                </h4>
                                                <input type="checkbox" name="h209aa"
                                                    <?php echo set_checkbox('h209aa', '1'); ?>
                                                       value="1" id="h209aa">
                                                ایل ایچھ ڈبلیو اکثر وزت پرنہیں آتی <br>
                                                <input type="checkbox"
                                                       name="h209ab" <?php echo set_checkbox('h209ab', '2'); ?>
                                                       value="2" id="h209ab">
                                                ایل ایچھ ڈبلیوکرونا کی وجہ سےوزٹ نہیں کرسکی <br>
                                                <input type="checkbox"
                                                       name="h209ac" <?php echo set_checkbox('h209ac', '3'); ?>
                                                       onclick="select3options(this, 'h209ac')"
                                                       value="3" id="h209ac">ایل ایچھ ڈبلیوآئی مگر ہم نے گھر میں
                                                آنے نہیں دیا <br>
                                                <div class="childHide hide">
                                                    <input type="checkbox"
                                                           name="h209ad" <?php echo set_checkbox('h209ad', '31'); ?>
                                                           value="31" id="h209ad"> ایل ایچھ ڈبلیونے ماسک نہیں پہنا ہوا
                                                    تھا
                                                    <br>
                                                    <input type="checkbox"
                                                           name="h209ae" <?php echo set_checkbox('h209ae', '32'); ?>
                                                           value="32" id="h209ae"> کرونا کا ڈریا خوف <br>
                                                    <input type="checkbox"
                                                           name="h209af" <?php echo set_checkbox('h209af', '33'); ?>
                                                           value="33" id="h209af">سماجی مفاصلا <br>
                                                    <input type="checkbox"
                                                           name="h209ag" <?php echo set_checkbox('h209ag', '34'); ?>
                                                           value="34" id="h209ag">حفاظتی سامان گھر پر موجود نہیں تھا
                                                    <br>
                                                </div>

                                            </div>
                                        </div>
                                        <hr class="hr hide">

                                        <div class="row urdu">
                                            <div class="col-md-12">
                                                <h4>
                                                    <small>h214 :</small>
                                                    کیا آپ کو عورتوں کی صحت عامہ کے بارے میں لیڈی ہیلتھ ورکر کی بات چیت
                                                    کے
                                                    بارے میں معلوم ہے یا کبھی آپ نے اس بات چیت میں حصہ لیا؟
                                                </h4>
                                                <input type="Radio" name="h214" <?php echo set_radio('h214', '1'); ?>
                                                       value="1" id="h214a" required>
                                                ہاں معلوم ہے<br>
                                                <input type="Radio" name="h214" <?php echo set_radio('h214', '2'); ?>
                                                       value="2" id="h214b" required>
                                                نہیں ،میں نہیں جانتی <br>
                                                <input type="Radio" name="h214" <?php echo set_radio('h214', '3'); ?>
                                                       value="3" id="h214c" required>
                                                ہاں حصہ لیا تھا <br>
                                                <input type="Radio" name="h214" <?php echo set_radio('h214', '4'); ?>
                                                       value="4" id="h214d" required>
                                                کبھی حصہ نہیں لیا<br>
                                                <input type="Radio" name="h214" <?php echo set_radio('h214', '5'); ?>
                                                       value="5" id="h214e" required>
                                                کرونا کی وجہ سے مٹینگ نہیں ہوئی<br>
                                            </div>
                                        </div>
                                        <hr class="hr">
                                        <div class="row urdu">
                                            <div class="col-md-12">
                                                <h4>
                                                    <small>h216 :</small>
                                                    کیا آپ کے گھر کے کسی مرد نے ولیج ہیلتھ کمیٹی کی میٹنگ میں حصہ لیا
                                                    ہے؟
                                                </h4>
                                                <input type="Radio" name="h216" onclick="skipQuestions('h216aa')"
                                                    <?php echo set_radio('h216', '1'); ?>
                                                       value="1" id="h216a" required>
                                                ہاں <br>
                                                <input type="Radio" name="h216" onclick="showQuestions('h216aa')"
                                                    <?php echo set_radio('h216', '2'); ?>
                                                       value="2" id="h216b" required>
                                                نہیں <br>
                                                <input type="Radio" name="h216" onclick="skipQuestions('h216aa')"
                                                    <?php echo set_radio('h216', '3'); ?>
                                                       value="3" id="h216c" required>
                                                کبھی سنا نہیں اس کے بارے میں <br></div>
                                        </div>
                                        <hr class="hr">

                                        <div class="row urdu h216aa hide">
                                            <div class="col-md-12">
                                                <h4>
                                                    <small>h216a :</small>
                                                    کیا آپ(نام) کو حفاظتی ٹیکےکیوں نہیں لگوائے؟
                                                </h4>
                                                <input type="checkbox"
                                                       name="h216aa" <?php echo set_checkbox('h216aa', '1'); ?>
                                                       value="1" id="h216aaa">
                                                اتنا اہم نہیں تھا <br>
                                                <input type="checkbox"
                                                       name="h216ab" <?php echo set_checkbox('h216ab', '2'); ?>
                                                       value="2" id="h216aba">
                                                ہسپتال کرونا کی وجہ سے بند تھ <br>
                                                <input type="checkbox"
                                                       name="h216ac" <?php echo set_checkbox('h216ac', '3'); ?>
                                                       value="3" id="h216ac">
                                                کرونا کا ڈریا خوف <br>
                                                <input type="checkbox"
                                                       name="h216ad" <?php echo set_checkbox('h216ad', '4'); ?>
                                                       value="4" id="h216ad">
                                                سماجی مفاصلہ <br>
                                                <input type="checkbox"
                                                       name="h216ae" <?php echo set_checkbox('h216ae', '5'); ?>
                                                       value="5" id="h216ae">
                                                کرونا کے لاک ڈائون کی وجہ سے سواری نہیں تھی <br>
                                                <input type="checkbox"
                                                       name="h216af" <?php echo set_checkbox('h216af', '6'); ?>
                                                       value="6" id="h216af">
                                                حفاظتی سامان (ماسک، دستانے) گھر پر موجود نہیں تھے <br>
                                                <input type="checkbox"
                                                       name="h216ag" <?php echo set_checkbox('h216ag', '7'); ?>
                                                       value="7" id="h216ag">
                                                ڈاکٹر احتیاطی تدابیر پر عمل نہیں کر رہا تھا (ماسک اور دستانے نہیں
                                                پہنےہوئے
                                                تھے) <br>

                                            </div>
                                        </div>
                                        <hr class="hr hide">
                                        <p class="myheading">
                                            سیکشن آئی- بچوں کی
                                            صحت
                                        </p>
                                        <p class="myheading2">تعلق کچھ سوالات کرونگا/کرونگی۔ (ARI)اب میں آپ سے آپ کے
                                            گھر
                                            میں موجود پانچ سال
                                            سے کم عمر بچوں میں دست(ڈائریا) اور نظام تنفس کے شدید انفیکشن </p>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h4>
                                                        <small>d103 :</small>
                                                        بچے کا نام
                                                    </h4>
                                                    <input type="text" id="d103" class="inp" name="d103" required
                                                           value="<?php echo set_value('d103', $this->session->userdata('d103')); ?>">
                                                </div>

                                            </div>
                                        </div>
                                        <hr class="hr">

                                        <div class="row urdu i101">
                                            <div class="col-md-12">
                                                <h4>
                                                    <small>i101 :</small>
                                                    کیا آپ کے گھر میں پانچ سال سے کم کسی بچے کو پچھلے دو ہفتوں میں دست
                                                    کی
                                                    تکلیف ہوئی ہے؟ (دست کی تعریف : 24 گھنٹے کے اندر 3 یا 3 سے زیادہ بار
                                                    پتلے
                                                    پاخانے)
                                                </h4>
                                                <input type="Radio" name="i101"
                                                    <?php echo set_radio('i101', '1'); ?>
                                                       onclick="showSection('i105','i106','i125','i203')"
                                                       value="1" id="i101a" required>
                                                ہاں <br>
                                                <input type="Radio" name="i101"
                                                    <?php echo set_radio('i101', '2'); ?>
                                                       onclick="skipSection('i105','i106','i125','i203')"
                                                       value="2" id="i101b" required>
                                                نہیں <br></div>
                                        </div>
                                        <hr class="hr">

                                        <div class="row urdu i105 hide">
                                            <div class="col-md-12">
                                                <h4>
                                                    <small>i105 :</small>
                                                    (نام) کو دستوں کی تکلیف ہونے پر کیا آپ نے علاج کروایا تھا؟
                                                </h4>
                                                <input type="Radio" name="i105" onclick="showMultiple('i125','i106')"
                                                    <?php echo set_radio('i105', '1'); ?>
                                                       value="1" id="i105a">
                                                ہاں <br>
                                                <input type="Radio" name="i105"
                                                       onclick="showMultiple('i106','i125')"
                                                    <?php echo set_radio('i105', '2'); ?>
                                                       value="2" id="i105b">
                                                نہیں <br>
                                            </div>
                                        </div>
                                        <hr class="hr hide">

                                        <div class="row urdu i106 hide">
                                            <div class="col-md-12">
                                                <h4>
                                                    <small>i106 :</small>
                                                    (نام) کو دستوں کی تکلیف ہونے پر آپ نے کیوں علاج نہیں کروایا ؟
                                                </h4>
                                                <input type="Radio" name="i106"
                                                    <?php echo set_radio('i106', '1'); ?>
                                                       value="1" id="i106a">
                                                اس مسئلے کے لیے علاج کروانے کی ضرورت نہیں تھی
                                                <input type="Radio" name="i106"
                                                       value="2" <?php echo set_radio('i106', '2'); ?>
                                                       id="i106b">
                                                صحت فراہم کرنے والے کو دینے کے لیے پیسے نہیں تھے
                                                <input type="Radio" name="i106"
                                                       value="3" <?php echo set_radio('i106', '3'); ?>
                                                       id="i106c">
                                                ٹرانسپورٹ دستیاب نہیں تھی
                                                <input type="Radio" name="i106" value="4"
                                                       <?php echo set_radio('i106', '4'); ?>id="i106d">
                                                کوئی مرد گھر پر موجود نہیں تھا جو مرکزِ صحت تک لے جاتا
                                                <input type="Radio" name="i106" value="5"
                                                       <?php echo set_radio('i106', '5'); ?>id="i106e">
                                                گھر کے سربراہ/شوہر/ساس نے اجازت نہیں دی
                                                <input type="Radio" name="i106"
                                                       value="6" <?php echo set_radio('i106', '6'); ?> id="i106f">
                                                مرکزِصحت بہت دور تھا
                                                <input type="Radio" name="i106" value="7"
                                                       <?php echo set_radio('i106', '7'); ?>id="i106j">
                                                ہسپتال کرونا کی وجہ سے بند تھا<br>
                                                <input type="Radio" name="i106"
                                                       value="8" <?php echo set_radio('i106', '8'); ?> id="i106k">
                                                کرونا کا ڈریا خوف<br>
                                                <input type="Radio" name="i106"
                                                       value="9" <?php echo set_radio('i106', '9'); ?> id="i106l">
                                                سماجی مفاصلہ <br>
                                                <input type="Radio" name="i106"
                                                       value="10" <?php echo set_radio('i106', '10'); ?> id="i106m">
                                                کرونا کے لاک ڈائون کی وجہ سے سواری نہیں تھی br>
                                                <input type="Radio" name="i106"
                                                       value="11" <?php echo set_radio('i106', '11'); ?> id="i106n">
                                                حفاظتی سامان (ماسک، دستانے) گھر پر موجود نہیں تھے <br>
                                                <input type="Radio" name="i106"
                                                       value="12" <?php echo set_radio('i106', '12'); ?> id="i106o">
                                                ڈاکٹر احتیاطی تدابیر پر عمل نہیں کر رہا تھا (ماسک اور دستانے نہیں
                                                پہنےہوئے
                                                تھے<br>
                                            </div>
                                        </div>
                                        <hr class="hr hide">

                                        <div class="row urdu i125 hide">
                                            <div class="col-md-12">
                                                <h4>
                                                    <small>i125 :</small>
                                                    کیا لیڈی ہیلتھ ورکر نے (نام) کے دستوں کی تکلیف کے دوران آپ کے گھر کا
                                                    وزٹ
                                                    کیا تھا ؟
                                                </h4>
                                                <input type="Radio" name="i125" <?php echo set_radio('i125', '1'); ?>
                                                       onclick="skipQuestions('i125aa')"
                                                       value="1" id="i125a">
                                                ہاں <br>
                                                <input type="Radio" name="i125" <?php echo set_radio('i125', '2'); ?>
                                                       onclick="showQuestions('i125aa')"
                                                       value="2" id="i125b">
                                                نہیں <br></div>
                                        </div>
                                        <hr class="hr hide">

                                        <div class="row urdu i125aa hide">
                                            <div class="col-md-12">
                                                <h4>
                                                    <small>i125a :</small>
                                                    لیڈی ہیلتھ ورکر کا وزٹ نہیں کرنے کا سبب کیا تھا؟
                                                </h4>
                                                <input type="checkbox"
                                                       name="i125aa" <?php echo set_checkbox('i125aa', '1'); ?>
                                                       value="1" id="i125aaa">
                                                ایل ایچھ ڈبلیو اکثر وزت پرنہیں آتی <br>
                                                <input type="checkbox"
                                                       name="i125ab" <?php echo set_checkbox('i125ab', '2'); ?>
                                                       value="2" id="i125aab">
                                                ایل ایچھ ڈبلیوکرونا کی وجہ سےوزٹ نہیں کرسکی <br>
                                                <input type="checkbox"
                                                       name="i125ac" <?php echo set_checkbox('i125ac', '3'); ?>
                                                       onclick="select3options(this,'i125aac')"
                                                       value="3" id="i125aac">ایل ایچھ ڈبلیوآئی مگر ہم نے گھر میں
                                                آنے نہیں دیا <br>
                                                <div class="childHide hide">
                                                    <input type="checkbox"
                                                           name="i125ad" <?php echo set_checkbox('i125ad', '31'); ?>
                                                           value="31" id="i125aad"> ایل ایچھ ڈبلیونے ماسک نہیں پہنا ہوا
                                                    تھا
                                                    <br>
                                                    <input type="checkbox"
                                                           name="i125ae" <?php echo set_checkbox('i125ae', '32'); ?>
                                                           value="32" id="i125aae"> کرونا کا ڈریا خوف <br>
                                                    <input type="checkbox"
                                                           name="i125af" <?php echo set_checkbox('i125af', '33'); ?>
                                                           value="33" id="i125aaf">سماجی مفاصلا <br>
                                                    <input type="checkbox"
                                                           name="i125ag" <?php echo set_checkbox('i125ag', '34'); ?>
                                                           value="34" id="i125aag">حفاظتی سامان گھر پر موجود نہیں تھا
                                                    <br>
                                                </div>

                                            </div>
                                        </div>
                                        <hr class="hr hide">

                                        <p class="myheading">
                                            ARI نظام تنفس کا شدید انفیکشن
                                        </p>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h4>
                                                        <small>d104 :</small>
                                                        بچے کا نام
                                                    </h4>
                                                    <input type="text" id="d104" class="inp" name="d104" required
                                                           value="<?php echo set_value('d104', $this->session->userdata('d104')); ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="hr">

                                        <div class="row urdu i203 hide">
                                            <div class="col-md-12">
                                                <h4>
                                                    <small>i203 :</small>
                                                    کیا کسی بچے کو پچھلے دو ہفتوں میں بخار کے ساتھ کھانسی کا مسئلہ درپیش
                                                    آیا۔ جیسے کہ سانس کا تیز چلنا/ یا سانس لینے میں دشواری؟
                                                </h4>
                                                <input type="Radio" name="i203" <?php echo set_radio('i203', '1'); ?>
                                                       onclick="showSection('i207','i208','i225','i225a')"
                                                       value="1" id="i203a">
                                                ہاں<br>
                                                <input type="Radio" name="i203" <?php echo set_radio('i203', '2'); ?>
                                                       onclick="skipSection('i207','i208','i225','i225a')"
                                                       value="2" id="i203b">
                                                نہیں<br>
                                            </div>
                                        </div>
                                        <hr class="hr hide">

                                        <div class="row urdu i207">
                                            <div class="col-md-12">
                                                <h4>
                                                    <small>i207 :</small>
                                                    کیاآپ نے (نام) کا کھانسی، بخار اور سانس میں دشواری کے لیے علاج
                                                    کروایا
                                                    تھا؟
                                                </h4>
                                                <input type="Radio" name="i207" <?php echo set_radio('i207', '1'); ?>
                                                       onclick="showMultiple('i225','i208')"
                                                       value="1" id="i207a" required>
                                                ہاں<br>
                                                <input type="Radio" name="i207" <?php echo set_radio('i207', '2'); ?>
                                                       onclick="showMultiple('i208','i225')"
                                                       value="2" id="i207b" required>
                                                نہیں<br>
                                            </div>
                                        </div>
                                        <hr class="hr">
                                        <div class="row urdu i208 hide">
                                            <div class="col-md-12">
                                                <h4>
                                                    <small>i208 :</small>
                                                    آپ نے (نام) کی بیماری کا علاج کیوں نہیں کروایا تھا؟
                                                </h4>
                                                <input type="checkBox"
                                                       name="i208a" <?php echo set_checkbox('i208a', '1'); ?>
                                                       value="1" id="i208a">
                                                مسئلہ اتنا بڑا نہیں تھا کہ علاج کرواتے
                                                <br>
                                                <input type="checkBox"
                                                       name="i208b" <?php echo set_checkbox('i208b', '2'); ?>
                                                       value="2" id="i208b">
                                                صحت کی سہولت فراہم کرنے والے کو دینے کے لیے پیسے نہیں تھے
                                                <br>
                                                <input type="checkBox"
                                                       name="i208c" <?php echo set_checkbox('i208c', '3'); ?>
                                                       value="3" id="i208c">
                                                ٹرانسپورٹ کی عدم دستیابی
                                                <br>
                                                <input type="checkBox"
                                                       name="i208d" <?php echo set_checkbox('i208d', '4'); ?>
                                                       value="4" id="i208d">
                                                کوئی مرد موجود نہیں تھا جو مرکزِ صحت لے کر جاسکے
                                                <br>
                                                <input type="checkBox"
                                                       name="i208e" <?php echo set_checkbox('i208e', '5'); ?>
                                                       value="5" id="i208e">
                                                گھر کے سربراہ/ شوہر/ساس نے اجازت نہیں دی
                                                <br>
                                                <input type="checkBox"
                                                       name="i208f" <?php echo set_checkbox('i208f', '6'); ?>
                                                       value="6" id="i208f">
                                                مرکز صحت کافی دور تھا
                                                <br>
                                                <input type="checkBox"
                                                       name="i208g" <?php echo set_checkbox('i208g', '7'); ?>
                                                       value="7" id="i208g">
                                                صحت کا مرکز بند تھا
                                                <br>
                                                <input type="checkBox"
                                                       name="i208h" <?php echo set_checkbox('i208h', '8'); ?>
                                                       value="8" id="i208h">
                                                سروسز یا خدمات کا معیار اچھا نہیں تھا
                                                <br>
                                                <input type="checkBox"
                                                       name="i208i" <?php echo set_checkbox('i208i', '9'); ?>
                                                       value="9" id="i208i">
                                                ہسپتال کرونا کی وجہ سے بند تھا
                                                <br>
                                                <input type="checkBox" name="i208j"
                                                    <?php echo set_checkbox('i208j', '10'); ?> value="10" id="i208j">
                                                کرونا کا ڈریا خوف<br>
                                                <input type="checkBox"
                                                       name="i208k" <?php echo set_checkbox('i208k', '11'); ?>
                                                       value="11" id="i208k">
                                                سماجی مفاصلہ <br>
                                                <input type="checkBox"
                                                       name="i208l" <?php echo set_checkbox('i208l', '12'); ?>
                                                       value="12" id="i208l">
                                                کرونا کے لاک ڈائون کی وجہ سے سواری نہیں تھی br>
                                                <input type="checkBox"
                                                       name="i208m" <?php echo set_checkbox('i208m', '13'); ?>
                                                       value="13" id="i208m">
                                                حفاظتی سامان (ماسک، دستانے) گھر پر موجود نہیں تھے <br>
                                                <input type="checkBox"
                                                       name="i208n" <?php echo set_checkbox('i208n', '14'); ?>
                                                       value="14" id="i208n">
                                                ڈاکٹر احتیاطی تدابیر پر عمل نہیں کر رہا تھا (ماسک اور دستانے نہیں
                                                پہنےہوئے
                                                تھے<br>
                                            </div>
                                        </div>
                                        <hr class="hr hide">
                                        <div class="row urdu i225 hide">
                                            <div class="col-md-12">
                                                <h4>
                                                    <small>i225 :</small>
                                                    کیا جب (نام) نمونیا کی بیماری میں مبتلا تھا اس وقت لیڈی ہیلتھ ورکر
                                                    نے آپ
                                                    کے گھر کا دورہ کیا
                                                </h4>
                                                <input type="Radio" <?php echo set_radio('i225', '1'); ?> name="i225"
                                                       onclick="skipQuestions('i225a')"
                                                       value="1" id="i225a">
                                                ہاں<br>
                                                <input type="Radio" <?php echo set_radio('i225', '2'); ?> name="i225"
                                                       onclick="showQuestions('i225a')"
                                                       value="2" id="i225b">
                                                نہیں<br>
                                            </div>
                                        </div>
                                        <hr class="hr hide">

                                        <div class="row urdu i225a hide">
                                            <div class="col-md-12">
                                                <h4>
                                                    <small>i225a :</small>
                                                    لیڈی ہیلتھ ورکر کا وزٹ نہیں کرنے کا سبب کیا تھا؟
                                                </h4>
                                                <input type="checkbox"
                                                       name="i225aa" <?php echo set_checkbox('i225aa', '1'); ?>
                                                       value="1" id="i225aa">
                                                ایل ایچھ ڈبلیو اکثر وذٹ پر نہیں آتی <br>
                                                <input type="checkbox"
                                                       name="i225ab" <?php echo set_checkbox('i225ab', '2'); ?>
                                                       value="2" id="i225ab">
                                                ایل ایچھ ڈبلیوکرونا کی وجہ سےوزٹ نہیں کرسکی <br>
                                                <input type="checkbox"
                                                       name="i225ac" <?php echo set_checkbox('i225ac', '3'); ?>
                                                       onclick="select3options(this,'i225ac')"
                                                       value="3" id="i225ac">ایل ایچھ ڈبلیوآئی مگر ہم نے گھر میں
                                                آنے نہیں دیا <br>
                                                <div class="childHide hide">
                                                    <input type="checkbox"
                                                           name="i225ad" <?php echo set_checkbox('i225ad', '31'); ?>
                                                           value="31" id="i225ad"> ایل ایچھ ڈبلیونے ماسک نہیں پہنا ہوا
                                                    تھا
                                                    <br>
                                                    <input type="checkbox"
                                                           name="i225ae" <?php echo set_checkbox('i225ae', '32'); ?>
                                                           value="32" id="i225ae"> کرونا کا ڈریا خوف <br>
                                                    <input type="checkbox"
                                                           name="i225af" <?php echo set_checkbox('i225af', '33'); ?>
                                                           value="33" id="i225af">سماجی مفاصلا <br>
                                                    <input type="checkbox"
                                                           name="i225ag" <?php echo set_checkbox('i225ag', '34'); ?>
                                                           value="34" id="i225ag">حفاظتی سامان گھر پر موجود نہیں تھا
                                                    <br>
                                                </div>

                                            </div>
                                        </div>
                                        <hr class="hr hide">

                                        <p class="myheading">
                                            سیکشن جے: حفاظتی
                                            ٹیکے
                                        </p>
                                        <p class="myheading2">اگر حفاظتی ٹیکوں کا کارڈ موجود ہے، تو حفاظتی ٹیکوں کے کارڈ
                                            سے
                                            ٹیکے لگنے کی تمام
                                            تاریخیں درج کرلیں۔ حفاظتی ٹیکوں کے کارڈ کی عدم موجودگی کی صورت میں، زبانی
                                            بتائی
                                            گئیں تاریخوں کے بارے میں معلومات درج کریں۔ بچے کی عمر( 12 سے 23 مہینے) ، اگر
                                            ایک
                                            سے زیادہ بچے ہیں تو سب سے کم عمر والے بچے کو منتخب کریں</p>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h4>
                                                        <small>d105 :</small>
                                                        بچے کا نام
                                                    </h4>
                                                    <input type="text" id="d105" class="inp" name="d105" required
                                                           value="<?php echo set_value('d105', $this->session->userdata('d105')); ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="hr">

                                        <div class="row urdu">
                                            <div class="col-md-12">
                                                <h4>
                                                    <small>j108 :</small>
                                                    کیا (نام)کو کبھی بیماریوں سے بچاؤکے لئے کوئی ویکسین لگی ہےجو اسے
                                                    بیماریوں سے بچا سکے۔ اس میں حفاظتی ٹیکوں کی مہم کے دوران لگنے والی
                                                    ویکسین ، حفاظتی ٹیکے لگانے والا دن یا بچوں کی صحت کے دن لگنے والی
                                                    ویکسین
                                                    شامل ہیں۔
                                                </h4>
                                                <input type="Radio" name="j108" <?php echo set_radio('j108', '1'); ?>
                                                       onclick="skipQuestions('j123')"
                                                       value="1" id="j108a" required>
                                                ہاں<br>
                                                <input type="Radio" name="j108" <?php echo set_radio('j108', '2'); ?>
                                                       onclick="showQuestions('j123')"
                                                       value="2" id="j108b" required>
                                                نہیں<br>
                                                <input type="Radio" name="j108" <?php echo set_radio('j108', '3'); ?>
                                                       onclick="skipQuestions('j123')"
                                                       value="98" id="j108c" required>
                                                معلوم نہیں<br></div>
                                        </div>
                                        <hr class="hr">

                                        <div class="row urdu j123 hide">
                                            <div class="col-md-12">
                                                <h4>
                                                    <small>j123 :</small>
                                                    (نام) کو حفاظتی ٹیکے کیوں نہیں لگوائے تھے؟ اگر بچے کوتمام حفاظتی
                                                    ٹیکے
                                                    نہیں لگوائے گئے، تو ماں/دیکھ بھال کرنے والے سے پوچھیں۔ بتائی گئیں
                                                    تمام
                                                    وجوہات کو ریکارڈ کریں لیکن فوری طور پر کسی مخصوص وجہ پر مت جائیں۔
                                                    ماں کو
                                                    تمام وجوہات فراہم کرنے کی ترغیب دیں۔
                                                </h4>
                                                <input type="checkBox"
                                                       name="j123a" <?php echo set_checkbox('j123a', '1'); ?>
                                                       value="1" id="j123a">
                                                حفاظتی ٹیکوں کا مرکزبہت دور تھا<br>
                                                <input type="checkBox"
                                                       name="j123b" <?php echo set_checkbox('j123b', '2'); ?>
                                                       value="2" id="j123b">
                                                حفاظتی ٹیکے لگوانے کا وقت مناسب نہیں تھا<br>
                                                <input type="checkBox"
                                                       name="j123c" <?php echo set_checkbox('j123c', '3'); ?>
                                                       value="3" id="j123c">
                                                ماں مصروف تھی<br>
                                                <input type="checkBox"
                                                       name="j123d" <?php echo set_checkbox('j123d', '4'); ?>
                                                       value="4" id="j123d">
                                                ماں کی بیماری سمیت، خاندانی مسائل<br>
                                                <input type="checkBox"
                                                       name="j123e" <?php echo set_checkbox('j123e', '5'); ?>
                                                       value="5" id="j123e">
                                                بچہ بیمار تھا،لے کر نہیں گئے<br>
                                                <input type="checkBox"
                                                       name="j123f" <?php echo set_checkbox('j123f', '6'); ?>
                                                       value="6" id="j123f">
                                                بچہ بیمار تھا،لے کر گئےتھےلیکن ویکسین نہیں لگوائی<br>
                                                <input
                                                        type="checkBox"
                                                        name="j123g" <?php echo set_checkbox('j123g', '7'); ?>
                                                        value="7"
                                                        id="j123g">
                                                طویل انتظار کرنے کی وجہ سے نہیں لگوائی<br>
                                                <input type="checkBox"
                                                       name="j123h" <?php echo set_checkbox('j123h', '8'); ?>
                                                       value="8" id="j123h">
                                                افواہوں کی وجہ سے نہیں لگوائی<br>
                                                <input type="checkBox"
                                                       name="j123i" <?php echo set_checkbox('j123i', '9'); ?>
                                                       value="9" id="j123i">
                                                حفاظتی ٹیکے لگوانے پر یقین نہیں ہے<br>
                                                <input type="checkBox"
                                                       name="j123j" <?php echo set_checkbox('j123j', '10'); ?>
                                                       value="10" id="j123j">
                                                ضمنی اثرات کا خوف<br>
                                                <input type="checkBox"
                                                       name="j123k" <?php echo set_checkbox('j123k', '11'); ?>
                                                       value="11" id="j123k">
                                                حفاظتی ٹیکے لگوانے کی جگہ اور وقت معلوم نہیں تھا<br>
                                                <input
                                                        type="checkBox"
                                                        name="j123l" <?php echo set_checkbox('j123l', '12'); ?>
                                                        value="12"
                                                        id="j123l">
                                                بچے کو لے کر گئےلیکن ویکسین نہیں تھی<br>
                                                <input type="checkBox"
                                                       name="j123m" <?php echo set_checkbox('j123m', '13'); ?>
                                                       value="13" id="j123m">
                                                بچے کو لے کر گئے لیکن ویکسین لگانے والا اسٹاف نہیں تھا<br>
                                                <input
                                                        type="checkBox"
                                                        name="j123n" <?php echo set_checkbox('j123n', '14'); ?>
                                                        value="14" id="j123n">
                                                بچے کو لے کر گئے لیکن حفاظتی ٹیکوں کا مرکز بند تھا<br>
                                                <input
                                                        type="checkBox"
                                                        name="j123o"
                                                        value="15" <?php echo set_checkbox('j123o', '15'); ?>
                                                        id="j123o">
                                                بچہ بیمار تھا<br>
                                                <input type="checkBox"
                                                       name="j123p" <?php echo set_checkbox('j123p', '16'); ?>
                                                       value="16" id="j123p">
                                                بچے کو لے کر گئے لیکن ٹیکے لگانے کا دن نہیں تھا<br>
                                                <input type="checkBox"
                                                       name="j123q" <?php echo set_checkbox('j123q', '17'); ?>
                                                       value="17" id="j123q">
                                                ہسپتال کرونا کی وجہ سے بند تھا<br>
                                                <input type="checkBox"
                                                       name="j123r" <?php echo set_checkbox('j123r', '18'); ?>
                                                       value="18" id="j123r">
                                                کرونا کا ڈریا خوف<br>
                                                <input type="checkBox"
                                                       name="j123s" <?php echo set_checkbox('j123s', '19'); ?>
                                                       value="19" id="j123s">
                                                سماجی مفاصلہ<br>
                                                <input type="checkBox"
                                                       name="j123t" <?php echo set_checkbox('j123t', '20'); ?>
                                                       value="20" id="j123t">
                                                کرونا کے لاک ڈائون کی وجہ سے سواری نہیں تھی
                                                حفاظتی سامان (ماسک، دستانے) گھر پر موجود نہیں تھے<br>
                                                <input type="checkBox"
                                                       name="j123u" <?php echo set_checkbox('j123u', '21'); ?>
                                                       value="21" id="j123u">کرونا کے لاک ڈائون کی وجہ سے سواری نہیں تھی
                                                تھے)<br>
                                                <input type="checkBox"
                                                       name="j123v" <?php echo set_checkbox('j123v', '22'); ?>
                                                       value="22" id="j123v"> حفاظتی سامان (ماسک، دستانے) گھر پر موجود
                                                نہیں
                                                تھے<br>
                                                <input type="checkBox"
                                                       name="j123w" <?php echo set_checkbox('j123w', '96'); ?>
                                                       onclick="showQuestions('j123wx')"
                                                       value="96" id="j123w">
                                                دیگر(وضاحت کریں) <br>
                                                <input type="checkBox"
                                                       name="j123y" <?php echo set_checkbox('j123y', '98'); ?>
                                                       value="98" id="j123y">
                                                معلوم نہیں<br>
                                            </div>
                                        </div>
                                        <hr class="hr hide">

                                        <div class="row j123wx hide">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h4>
                                                        <small>j123wx :</small>
                                                        دیگر(وضاحت کریں)
                                                    </h4>
                                                    <input type="text" id="j123wx" class="inp"
                                                           value="<?php echo set_value('j123wx', $this->session->userdata('j123wx')); ?>"
                                                           name="j123wx">
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="hr hide">


                                        <p class="myheading">
                                            سیکشن کے : خاندانی
                                            منصوبہ بندی
                                        </p>
                                        <p class="myheading2">اب میں آپ سے خاندانی منصوبہ بندی کے متعلق سوالات
                                            کرونگی/کرونگا، جیسے کہ مانع حمل
                                            کےبہت سے طریقہ کار جو عام طور پر شادی شدے جوڑے استعمال کرتے ہیں</p>


                                        <div class="row urdu">
                                            <div class="col-md-12">
                                                <h4>
                                                    <small>k107 :</small>
                                                    کیا(ایل ایچ ڈبلیو)نے مانع حمل کی گولیاں فراہم کی تھیں /یا دیگر مانع
                                                    حمل
                                                    طریقوں کے بارے میں بتایا تھا؟
                                                </h4>
                                                <input type="Radio" name="k107" <?php echo set_radio('k107', '1'); ?>
                                                       onclick="skipQuestions('k107aa')"
                                                       value="1" id="k107a" required>
                                                ہاں<br>
                                                <input type="Radio" name="k107" <?php echo set_radio('k107', '2'); ?>
                                                       onclick="showQuestions('k107aa')"
                                                       value="2" id="k107b" required>
                                                نہیں<br></div>
                                        </div>
                                        <hr class="hr">
                                        <div class="row urdu k107aa hide">
                                            <div class="col-md-12">
                                                <h4>
                                                    <small>k107a :</small>
                                                    لیڈی ہیلتھ ورکر کا وزٹ نہیں کرنے کا سبب کیا تھا؟
                                                </h4>
                                                <input type="checkbox"
                                                       name="k107aa" <?php echo set_checkbox('k107aa', '1'); ?>
                                                       value="1" id="k107aaa">
                                                ایل ایچھ ڈبلیو اکثر وزت پرنہیں آتی <br>
                                                <input type="checkbox"
                                                       name="k107ab" <?php echo set_checkbox('k107ab', '2'); ?>
                                                       value="2" id="k107aab">
                                                ایل ایچھ ڈبلیوکرونا کی وجہ سےوزٹ نہیں کرسکی <br>
                                                <input type="checkbox"
                                                       name="k107ac" <?php echo set_checkbox('k107ac', '3'); ?>
                                                       onclick="select3options(this,'k107aac')"
                                                       value="3" id="k107aac">ایل ایچھ ڈبلیوآئی مگر ہم نے گھر میں
                                                آنے نہیں دیا <br>
                                                <div class="childHide hide">
                                                    <input type="checkbox"
                                                           name="k107ad" <?php echo set_checkbox('k107ad', '31'); ?>
                                                           value="31" id="k107aad"> ایل ایچھ ڈبلیونے ماسک نہیں پہنا ہوا
                                                    تھا
                                                    <br>
                                                    <input type="checkbox"
                                                           name="k107ae" <?php echo set_checkbox('k107ae', '32'); ?>
                                                           value="32" id="k107aae"> کرونا کا ڈریا خوف <br>
                                                    <input type="checkbox"
                                                           name="k107af" <?php echo set_checkbox('k107af', '33'); ?>
                                                           value="33" id="k107aaf">سماجی مفاصلا <br>
                                                    <input type="checkbox"
                                                           name="k107ag" <?php echo set_checkbox('k107ag', '34'); ?>
                                                           value="34" id="k107aag">حفاظتی سامان گھر پر موجود نہیں تھا
                                                    <br>
                                                </div>

                                            </div>
                                        </div>
                                        <hr class="hr hide">
                                        <p class="myheading">
                                            سیکشن او
                                        </p>
                                        <p class="myheading2">اتھ دھونے سے متعلق معلومات</p>


                                        <div class="row urdu">
                                            <div class="col-md-12">
                                                <h4>
                                                    <small>o108 :</small>
                                                    انٹرویو کا نتیجہ:
                                                </h4>
                                                <input type="Radio" name="o108" <?php echo set_radio('k107', '1'); ?>
                                                       onclick="skipQuestions('o108x')"
                                                       value="1" id="o108a" required>
                                                مکمل <br>
                                                <input type="Radio" name="o108" <?php echo set_radio('k107', '2'); ?>
                                                       onclick="skipQuestions('o108x')"
                                                       value="2" id="o108b" required>
                                                انکار کردیا<br>
                                                <input type="Radio" name="o108" <?php echo set_radio('o108', '3'); ?>
                                                       onclick="skipQuestions('o108x')"
                                                       value="3" id="o108c" required>
                                                رہائش مستقل طور پر بند ہے <br>
                                                <input type="Radio" name="o108" <?php echo set_radio('o108', '4'); ?>
                                                       onclick="skipQuestions('o108x')"
                                                       value="4" id="o108d" required>
                                                رہائش عارضی طور پر بند ہے<br>
                                                <input type="Radio" name="o108" <?php echo set_radio('o108', '5'); ?>
                                                       onclick="skipQuestions('o108x')"
                                                       value="5" id="o108e" required>
                                                التواع<br>
                                                <input type="Radio" name="o108" <?php echo set_radio('o108', '6'); ?>
                                                       onclick="skipQuestions('o108x')"
                                                       value="6" id="o108f" required>
                                                رہائش گاہ خالی ہے <br>
                                                <input type="Radio" name="o108" <?php echo set_radio('o108', '7'); ?>
                                                       onclick="skipQuestions('o108x')"
                                                       value="7" id="o108g" required>
                                                نا مکمل<br>
                                                <input type="Radio" name="o108" <?php echo set_radio('o108', '8'); ?>
                                                       onclick="skipQuestions('o108x')"
                                                       value="8" id="o108h" required>
                                                کرونا کی بیماری کی وجہ سےجوب نہیں ملا<br>
                                                <input type="Radio" name="o108" <?php echo set_radio('o108', '96'); ?>
                                                       onclick="showQuestions('o108x')"
                                                       value="96" id="o108i" required>
                                                دیگر وضاحت کریں<br>
                                            </div>
                                        </div>
                                        <hr class="hr">

                                        <div class="row o108x hide">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h4>
                                                        <small>o108x :</small>
                                                        دیگر(وضاحت کریں)
                                                    </h4>
                                                    <input type="text" id="o108x" class="inp"
                                                           value="<?php echo set_value('o108x', $this->session->userdata('o108x')); ?>"
                                                           name="o108x">
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="hr hide">

                                        <p>آپ کے وقت دینے کا بہت شکریہ۔ آپ نے جو معلومات فراہم کی ہیں، وہ ہمیں صحت کی
                                            خدمات
                                            کے پروگرام کو ڈیزائن کرنے میں مدد گار ثابت ہونگی۔آپ ہم سے سینٹر آف ایکسیلینس
                                            وومن اینڈ چائلڈ ہیلتھ آغا خان یونیورسٹی کے آفس پر رابطہ کر سکتے ہیں۔( ضلعی
                                            مینیجرز کے رابطے کی تفصیلات سے متعلق معلومات فراہم کریں)۔

                                        </p>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group  ">
                                                    <label for="remarks" class="urdu">ریمارکس </label>
                                                    <textarea name="remarks" class="inp" id="remarks" cols="75"
                                                              rows="5"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer <?php if (!isset($_POST['hhhead']) || $_POST['hhhead'] == '' || !isset($_POST['d102']) || $_POST['d102'] == '') {
                                    echo 'hide';
                                } ?>">
                                    <?php echo form_submit('submit', "Upload Form", 'class="btn btn-primary"'); ?>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                            <div class="col-sm-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php echo $this->load->view('includes/footer'); ?>
</div>
<?php echo $this->load->view('includes/scripts'); ?>
<script>
    // Numeric only control handler
    jQuery.fn.ForceNumericOnly =
        function () {
            return this.each(function () {
                $(this).keydown(function (e) {
                    var key = e.charCode || e.keyCode || 0;
                    return (
                        key == 8 ||
                        key == 9 ||
                        key == 13 ||
                        key == 46 ||
                        key == 110 ||
                        key == 190 ||
                        (key >= 35 && key <= 40) ||
                        (key >= 48 && key <= 57) ||
                        (key >= 96 && key <= 105));
                });
            });
        };

    $(document).ready(function () {
        $("#a101").ForceNumericOnly();
        $("#e106a").ForceNumericOnly();
        $("#e106b").ForceNumericOnly();
        $("#e106c").ForceNumericOnly();
    });

    function checkCluster() {
        var cluster_no = $("#cluster_no").val();
        var hhno = $("#hhno").val();
        var flag = 0;
        if (cluster_no == '' || cluster_no == undefined || cluster_no.length < 6) {
            $("#cluster_no").css('border', '1px solid red');
            flag = 1;
            return false;
        } else {
            $("#cluster_no").css('border', '1px solid grey');
        }
        if (hhno == '' || hhno == undefined) {
            $("#hhno").css('border', '1px solid red');
            flag = 1;
            return false;
        } else {
            $("#hhno").css('border', '1px solid grey');
        }
        if (flag == 0) {
            $.ajax({
                url: '<?php echo base_url() ?>index.php/Forms/checkCluster',
                method: 'POST',
                data: 'cluster_no=' + cluster_no + '&hhno=' + hhno,
                success: function (res) {
                    if (res != '') {
                        var response = JSON.parse(res);
                        if (response.result == 1) {
                            $("#cluster_no").attr('readonly', 'readonly');
                            $("#hhno").attr('readonly', 'readonly');
                            $('.checkBtn').addClass('hide');
                            $(".mainform").removeClass('hide');
                            $(".box-footer").removeClass('hide');
                        } else if (response.result == 2 || response.result == 3 || response.result == 4) {
                            alert('Invalid Cluster');
                            $("#cluster_no").css('border', '1px solid red');
                        }
                    }
                }
            })
        } else {
            alert('Something went wrong');
        }
    }

    function showQuestions(skipQues) {
        $('.' + skipQues).removeClass('hide').next('.hr').removeClass('hide');
        var j = $('.' + skipQues + ' input');
        $.each(j, function (i, v) {
            $(v).val([]);
        });
    }

    function skipQuestions(skipQues) {
        $('.' + skipQues).addClass('hide').next('.hr').addClass('hide');
        var j = $('.' + skipQues + ' input');
        $.each(j, function (i, v) {
            $(v).val([]);
        });
    }

    function skipSection(skipQues1, skipQues2, skipQues3, skipQues4, skipQues5) {
        $('.' + skipQues1).addClass('hide').next('.hr').addClass('hide');
        $('.' + skipQues2).addClass('hide').next('.hr').addClass('hide');
        $('.' + skipQues3).addClass('hide').next('.hr').addClass('hide');
        $('.' + skipQues4).addClass('hide').next('.hr').addClass('hide');
        $('.' + skipQues5).addClass('hide').next('.hr').addClass('hide');
        var j = $('.' + skipQues1 + ' input');
        $.each(j, function (i, v) {
            $(v).val([]);
        });

        var k = $('.' + skipQues2 + ' input');
        $.each(k, function (i, v) {
            $(v).val([]);
        });

        var l = $('.' + skipQues3 + ' input');
        $.each(l, function (i, v) {
            $(v).val([]);
        });

        var m = $('.' + skipQues4 + ' input');
        $.each(m, function (i, v) {
            $(v).val([]);
        });

        var n = $('.' + skipQues5 + ' input');
        $.each(n, function (i, v) {
            $(v).val([]);
        });

    }

    function showSection(skipQues1, skipQues2, skipQues3, skipQues4, skipQues5) {
        $('.' + skipQues1).removeClass('hide').next('.hr').removeClass('hide');
        $('.' + skipQues2).removeClass('hide').next('.hr').removeClass('hide');
        $('.' + skipQues3).removeClass('hide').next('.hr').removeClass('hide');
        $('.' + skipQues4).removeClass('hide').next('.hr').removeClass('hide');
        $('.' + skipQues5).removeClass('hide').next('.hr').removeClass('hide');
        var j = $('.' + skipQues1 + ' input');
        $.each(j, function (i, v) {
            $(v).val([]);
        });

        var k = $('.' + skipQues2 + ' input');
        $.each(k, function (i, v) {
            $(v).val([]);
        });

        var l = $('.' + skipQues3 + ' input');
        $.each(l, function (i, v) {
            $(v).val([]);
        });

        var m = $('.' + skipQues4 + ' input');
        $.each(m, function (i, v) {
            $(v).val([]);
        });

        var n = $('.' + skipQues5 + ' input');
        $.each(n, function (i, v) {
            $(v).val([]);
        });

    }

    function select3options(obj, select) {
        var opt1 = $("#" + select + ":checked").val();
        if (opt1 != '' && opt1 != undefined) {
            $(obj).parent('div').find('.childHide').removeClass('hide');
        } else {
            $(obj).parent('div').find('.childHide').addClass('hide');
        }
        var j = $(obj).parent('div').find('.childHide input');
        $.each(j, function (i, v) {
            $(v).val([]);
        });
    }

    function showMultiple(skipQues, skipQuest2) {
        $('.' + skipQues).removeClass('hide').next('.hr').removeClass('hide');
        $('.' + skipQuest2).addClass('hide').next('.hr').addClass('hide');
        var j = $('.' + skipQues + ' input');
        $.each(j, function (i, v) {
            $(v).val([]);
        });

        var k = $('.' + skipQuest2 + ' input');
        $.each(k, function (i, n) {
            $(n).val([]);
        });
    }
</script>
