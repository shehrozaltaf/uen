<body class="hold-transition skin-blue sidebar-mini fixed">
<style>
    @import url(https://fonts.googleapis.com/earlyaccess/notonaskharabic.css);


    /*.myformControl{
        width: 90%;
    }*/

    .urdu {
        font-family: 'Noto Naskh Arabic', serif;
        font-size: 16px;
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
                                <?= validation_errors("<p style='color:red;'>", "</p>") ?>
                                <?php if (validation_errors()) { ?>
                                    <hr style="border: none; height: 5px;color: #333;background-color:red;"><?php } ?>
                                <?php echo form_open_multipart("index.php/Forms/submitForm"); ?>
                                <div class="box-body urdu">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="crf_name" class="urdu">کلسٹر نمبر</label>
                                                <input type="text" id="A101" class="form-control"
                                                       placeholder="کلسٹر نمبر" name="A101">
                                            </div>

                                        </div>
                                    </div>
                                    <script>
                                        function skipQuestion(selectOption, skipQues) {
                                            alert(1);
                                        }
                                    </script>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group  ">
                                                <label for="crf_title" class="urdu">کلسٹرکی قسم </label>
                                                <input type="text" id="cluster_type" class="form-control"
                                                       placeholder="کلسٹرکی قسم" name="cluster_type">
                                            </div>
                                        </div>
                                    </div>

                                    <p class="myheading"> سیکشن ایف : حمل کی
                                        دیکھ بھال
                                    </p>
                                    <p class="myheading2">اب میں آپ کے گزشتہ حمل، بچے کی پیدائش اور آپ کی صحت کی دیکھ
                                        بھال سے متعلق رویوں
                                        کی معلومات حاصل کرنے جا رہی ہوں</p>
                                    <div class="row urdu">
                                        <div class="col-md-12">
                                            <h4>
                                                <small>f101 :</small>
                                                کیا آپ نے اپنے آخری حمل کے دوران (نام) کی پیدائش سے قبل حمل کی دیکھ بھال
                                                کے لئے کسی سے معائنہ یا چیک اپ کروایا تھا؟
                                            </h4>
                                            <input type="Radio" name="f101" value="1" id="f101y" required>
                                            ہاں<br>
                                            <input type="Radio" name="f101" onclick="skipQuestion('f101','f101a')"
                                                   value="2" id="f101n" required>
                                            نہیں<br>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row urdu">
                                        <div class="col-md-12">
                                            <h4>
                                                <small>f101a :</small>
                                                آپ نے اپنے آخری حمل کے دوران (نام) کی پیدائش سے قبل معائنہ کیوں نہیں
                                                کروایا تھا؟ ایک سے زیادہ جوابات آسکتے ہیں۔
                                            </h4>
                                            <input type="CheckBox" name="f101a"
                                                   value="1" id="f101aa">
                                            سواری نہیں تھی <br>
                                            <input type="CheckBox" name="f101a"
                                                   value="2" id="f101ab">
                                            ہسپتال کے عملے کا رویہ صحیح نہیں تھا <br>
                                            <input type="CheckBox" name="f101a"
                                                   value="3" id="f101ac">
                                            ہسپتال میں کام نہیں ہو رہا تھا <br>
                                            <input type="CheckBox" name="f101a"
                                                   value="4" id="f101ad">
                                            مرکز صحت بہت دور تھا<br>
                                            <input type="CheckBox" name="f101a"
                                                   value="5" id="f101ae">
                                            کوئی مرد/شوہر مرکز صحت لے جانے کے لیئے موجود نہیں تھا<br>
                                            <input
                                                    type="CheckBox" name="f101a"
                                                    value="6" id="f101af">
                                            ناقص معیار کی خدمات <br>
                                            <input type="CheckBox" name="f101a"
                                                   value="7" id="f101ag">
                                            مرکز صحت میں کوئی خاتون ڈاکٹر دستیاب نہیں<br>
                                            <input type="CheckBox"
                                                   name="f101a"
                                                   value="8" id="f101ah">
                                            ضروری نہیں سمجھا<br>
                                            <input type="CheckBox" name="f101a" value="9" id="f101ai">
                                            علاج مہنگا ہے <br>
                                            <input type="CheckBox" name="f101a" value="10" id="f101aj">
                                            ہسپتال کرونا کی وجہ سے بند تھا<br>
                                            <input type="CheckBox" name="f101a" value="11" id="f101ak">
                                            کرونا کا ڈریا خوف<br>
                                            <input type="CheckBox" name="f101a" value="12" id="f101al">
                                            سماجی مفاصلہ <br>
                                            <input type="CheckBox" name="f101a" value="13" id="f101am">
                                            کرونا کے لاک ڈائون کی وجہ سے سواری نہیں تھی br>
                                            <input type="CheckBox" name="f101a" value="14" id="f101an">
                                            حفاظتی سامان (ماسک، دستانے) گھر پر موجود نہیں تھے <br>
                                            <input type="CheckBox" name="f101a" value="15" id="f101ao">
                                            ڈاکٹر احتیاطی تدابیر پر عمل نہیں کر رہا تھا (ماسک اور دستانے نہیں پہنےہوئے
                                            تھے<br>

                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row urdu">
                                        <div class="col-md-12">
                                            <h4>
                                                <small>f121 :</small>
                                                کیا گزشتہ حمل کے دوران(ایل ایچ ڈبلیو) لیڈی ہیلتھ ورکرنے آپ کے گھر کا
                                                دورہ کیا تھا؟
                                            </h4>
                                            <input type="Radio" name="f121"
                                                   value="1" id="f121a" required>
                                            ہاں <br>
                                            <input type="Radio" name="f121"
                                                   value="2" id="f121b" required>
                                            نہیں <br>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row urdu">
                                        <div class="col-md-12">
                                            <h4>
                                                <small>f121a :</small>
                                                کیا گزشتہ حمل کے دوران(ایل ایچ ڈبلیو) لیڈی ہیلتھ ورکرنے کرونا کی وبا کے
                                                دوران آپ کے گھر کا دورہ کیا تھا
                                            </h4>
                                            <input type="Radio" name="f121a"
                                                   value="1" id="f121aa" required>
                                            ہاں <br>
                                            <input type="Radio" name="f121a" onclick="skipQuestion('f121b','f121b')"
                                                   value="2" id="f121ab" required>
                                            نہیں <br>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row urdu">
                                        <div class="col-md-12">
                                            <h4>
                                                <small>f121b :</small>
                                                لیڈی ہیلتھ ورکر کا وزٹ نہیں کرنے کا سبب کیا تھاا
                                            </h4>
                                            <input type="Radio" name="f121b"
                                                   value="1" id="f121ba" required>
                                            ایل ایچھ ڈبلیو اکثر وزت پرنہیں آتی <br>
                                            <input type="Radio" name="f121b"
                                                   value="2" id="f121bb" required>
                                            ایل ایچھ ڈبلیوکرونا کی وجہ سےوزٹ نہیں کرسکی <br>
                                            <input type="Radio" name="f121b"
                                                   value="3" id="f121bc" required>ایل ایچھ ڈبلیوآئی مگر ہم نے گھر میں
                                            آنے نہیں دیا <br>
                                            <input type="Radio" name="f121b"
                                                   value="31" id="f121bd" required> ایل ایچھ ڈبلیونے ماسک نہیں پہنا ہوا
                                            تھا
                                            <br>
                                            <input type="Radio" name="f121b"
                                                   value="32" id="f121be" required> کرونا کا ڈریا خوف <br>
                                            <input type="Radio" name="f121b"
                                                   value="33" id="f121b" required>سماجی مفاصلا <br>
                                            <input type="Radio" name="f121b"
                                                   value="34" id="f121bf" required>حفاظتی سامان گھر پر موجود نہیں تھا
                                            <br>

                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row urdu">
                                        <div class="col-md-12">
                                            <h4>
                                                <small>f129 :</small>
                                                کیا آپ نے اوپر بیان کی گئیں خطرناک علامات /مسائل کی دیکھ بھال کے لئے
                                                علاج کروایا تھا؟
                                            </h4>
                                            <input type="Radio" name="f129" onclick="skipQuestion('f129','f130')"
                                                   value="1" id="f129a" required>
                                            ہاں <br>
                                            <input type="Radio" name="f129"
                                                   value="2" id="f129b" required>
                                            نہیں <br>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row urdu">
                                        <div class="col-md-12">
                                            <h4>
                                                <small>f130 :</small>
                                                آپ(نام)کی پیدائش سےقبل حمل کے دوران پیش آنے والیخطرناک علامات/مسائل کی
                                                دیکھ بھال کے لئے کسی صحت کی سہولیات فراہم کرنے والے کے پاس کیوں نہیں
                                                گئیں؟ سب پر نشان لگائیں جو لاگو ہوتے ہیں
                                            </h4>
                                            <input type="CheckBox" name="f130"
                                                   value="1" id="f130a">
                                            سواری نہیں تھی <br>
                                            <input type="CheckBox" name="f130"
                                                   value="2" id="f130b">
                                            ہسپتال کے عملے کا رویہ صحیح نہیں تھا <br>
                                            <input type="CheckBox" name="f130"
                                                   value="3" id="f130c">
                                            ہسپتال میں کام نہیں ہو رہا تھا <br>
                                            <input type="CheckBox" name="f130"
                                                   value="4" id="f130d">
                                            مرکز صحت بہت دور تھا<br>
                                            <input type="CheckBox" name="f130"
                                                   value="5" id="f130e">
                                            کوئی مرد/شوہر مرکز صحت لے جانے کے لیئے موجود نہیں تھا<br>
                                            <input
                                                    type="CheckBox" name="f130"
                                                    value="6" id="f130f">
                                            ناقص معیار کی خدمات<br>
                                            <input type="CheckBox" name="f130"
                                                   value="7" id="f130g">
                                            مرکز صحت میں کوئی خاتون ڈاکٹر دستیاب نہیں<br>
                                            <input type="CheckBox"
                                                   name="f130"
                                                   value="8" id="f130h">
                                            ضروری نہیں سمجھا<br>
                                            <input type="CheckBox" name="f130"
                                                   value="9" id="f130i">
                                            علاج مہنگا ہے<br>
                                            <input type="CheckBox" name="f130" value="10" id="f130j">
                                            ہسپتال کرونا کی وجہ سے بند تھا<br>
                                            <input type="CheckBox" name="f130" value="11" id="f130k">
                                            کرونا کا ڈریا خوف<br>
                                            <input type="CheckBox" name="f130" value="12" id="f130l">
                                            سماجی مفاصلہ <br>
                                            <input type="CheckBox" name="f130" value="13" id="f130m">
                                            کرونا کے لاک ڈائون کی وجہ سے سواری نہیں تھی br>
                                            <input type="CheckBox" name="f130" value="14" id="f130n">
                                            حفاظتی سامان (ماسک، دستانے) گھر پر موجود نہیں تھے <br>
                                            <input type="CheckBox" name="f130" value="15" id="f130o">
                                            ڈاکٹر احتیاطی تدابیر پر عمل نہیں کر رہا تھا (ماسک اور دستانے نہیں پہنےہوئے
                                            تھے<br>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row urdu">
                                        <div class="col-md-12">
                                            <h4>
                                                <small>f134 :</small>
                                                (نام) کی پیدائش کے لئے آپ نے کیا اقدامات کئے تھے؟ جوابات پڑھیں، ایک سے
                                                زیادہ جوابات آ سکتے ہیں
                                            </h4>
                                            <input type="CheckBox" name="f134"
                                                   value="1" id="f134a">
                                            دائی کا انتخاب<br>
                                            <input type="CheckBox" name="f134"
                                                   value="2" id="f134b">
                                            کسی بھی پیچیدگی کی صورت میں مرکز صحت جانےکا انتخاب <br>
                                            <input
                                                    type="CheckBox" name="f134"
                                                    value="3" id="f134c">
                                            کسی بھی ایمرجنسی سے نمٹنے کے لئے پیسوں کا بندوبست<br>
                                            <input type="CheckBox"
                                                   name="f134"
                                                   value="4"
                                                   id="f134d">
                                            وقت سے پہلے گاڑی کا بندوبست<br>
                                            <input type="CheckBox" name="f134"
                                                   value="5" id="f134e">
                                            کلین ڈیلیوری کٹ کا بندوبست <br>
                                            <input type="CheckBox" name="f134"
                                                   value="6" id="f134f">
                                            خون کابندوبست<br>
                                            <input type="CheckBox" name="f134"
                                                   value="7" id="f134g">
                                            کوئی اقدامات یا تیاری نہیں کی تھی<br>
                                            <input type="CheckBox" name="f134"
                                                   value="8" id="f134h">
                                            کرونا کی وجہ سےکوئی تیاری نہیں کی<br>
                                        </div>
                                    </div>
                                    <hr>


                                    <p class="myheading"> سیکشن جی: زچگی کی
                                        تیاری اور تجربات
                                    </p>
                                    <p class="myheading2">اب میں آپ سے آپ کی آخری (حالیہ)زچگی کی گزشتہ معلومات اوراس کی
                                        تیاری کے بارے میں
                                        کچھ سوال کرنا چاہتا/چاہتی ہوں</p>

                                    <div class="row urdu">
                                        <div class="col-md-12">
                                            <h4>
                                                <small>g102 :</small>
                                                (نام) کی پیدائش کہاں ہوئی تھی؟
                                            </h4>
                                            <input type="Radio" name="g102" onclick="skipQuestion('g012a','g103')"
                                                   value="1" id="g102a" required>
                                            گھر پر
                                            <br>
                                            <input type="Radio" name="g102"
                                                   value="2" id="g102b" required>
                                            سرکاری مرکز صحت
                                            <br>
                                            <input type="Radio" name="g102"
                                                   value="3" id="g102c" required>
                                            نجی مرکز صحت
                                            <br>
                                            <input type="Radio" name="g102"
                                                   value="4" id="g102d" required>
                                            رفاہی ادارہ یا مرکز صحت
                                            <br>
                                            <input type="Radio" name="g102"
                                                   value="5" id="g102e" required>
                                            مرکز صحت جاتے ہوئے راستے میں
                                            <br>
                                            <input type="Radio" name="g102"
                                                   value="6" id="g102f" required>
                                            Birth stationمیٹرنیٹی ہوم
                                            <br>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row urdu">
                                        <div class="col-md-12">
                                            <h4>
                                                <small>e106 :</small>
                                                کس مہینے اور سال میں (نام) کی پیدائش ہوئی تھی؟

                                                مزید پوچھیں: اس بچہ/بچی کی سالگرہ کب ہوتی ہے؟
                                                Date of delivery

                                            </h4>
                                            <input type="input" name="e106a"
                                                   value="1" id="e106a" required>
                                            دن
                                            <br>
                                            <input type="input" name="e106b" id="e106b" required>
                                            مہینہ
                                            <br>
                                            <input type="input" name="e106c" id="e106c" required>
                                            سال
                                            <br>

                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row urdu">
                                        <div class="col-md-12">
                                            <h4>
                                                <small>g103 :</small>
                                                آپ نے (نام) کی پیدائش مرکز صحت پر کیوں نہیں کروائی؟ اگر زچگی گھر میں
                                                ہوئی تھی۔ کسی
                                                اور وجہ کی نشاندہی کرنے کے لئے تحقیق کریں۔ بتائے گئے تمام جوابات ریکارڈ
                                                کریں۔
                                            </h4>
                                            <input type="CheckBox" name="g103"
                                                   value="1" id="g103a">
                                            سواری نہیں تھی
                                            <br>
                                            <input type="CheckBox" name="g103"
                                                   value="2" id="g103b">
                                            ہسپتال کے عملے کا رویہ صحیح نہیں تھا
                                            <br>
                                            <input type="CheckBox" name="g103"
                                                   value="3" id="g103c">
                                            ہسپتال میں کام نہیں ہو رہا تھا
                                            <br>
                                            <input type="CheckBox" name="g103"
                                                   value="4" id="g103d">
                                            مرکز صحت بہت دور تھا
                                            <br>
                                            <input type="CheckBox" name="g103"
                                                   value="5" id="g103e">
                                            کوئی مرد/شوہر مرکز صحت لے جانے کے لیئے موجود نہیں تھا
                                            <br>
                                            <input type="CheckBox" name="g103"
                                                   value="6" id="g103f">
                                            ناقص معیار کی خدمات
                                            <br>
                                            <input type="CheckBox" name="g103"
                                                   value="7" id="g103g">
                                            مرکز صحت میں کوئی خاتون ڈاکٹر دستیاب نہیں
                                            <br>
                                            <input type="CheckBox" name="g103"
                                                   value="8" id="g103h">
                                            ضروری نہیں سمجھا
                                            <br>
                                            <input type="CheckBox" name="g103"
                                                   value="9" id="g103i">
                                            علاج مہنگا ہے
                                            <br>
                                            <input type="CheckBox" name="g103" value="10" id="g103j">
                                            ہسپتال کرونا کی وجہ سے بند تھا<br>
                                            <input type="CheckBox" name="g103" value="11" id="g103k">
                                            کرونا کا ڈریا خوف<br>
                                            <input type="CheckBox" name="g103" value="12" id="g103l">
                                            سماجی مفاصلہ <br>
                                            <input type="CheckBox" name="g103" value="13" id="g103m">
                                            کرونا کے لاک ڈائون کی وجہ سے سواری نہیں تھی br>
                                            <input type="CheckBox" name="g103" value="14" id="g103n">
                                            حفاظتی سامان (ماسک، دستانے) گھر پر موجود نہیں تھے <br>
                                            <input type="CheckBox" name="g103" value="15" id="g103o">
                                            ڈاکٹر احتیاطی تدابیر پر عمل نہیں کر رہا تھا (ماسک اور دستانے نہیں پہنےہوئے
                                            تھے<br>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row urdu">
                                        <div class="col-md-12">
                                            <h4>
                                                <small>g125 :</small>
                                                کیاآپ کےبچے
                                                کی پیدائش کے وقت
                                                ایل-ایچ-ڈبلیو موجود
                                                تھی؟
                                            </h4>
                                            <input type="Radio"
                                                   name="g125"
                                                   value="1"
                                                   id="g125a"
                                                   required>
                                            ہاں
                                            <br>
                                            <input type="Radio"
                                                   name="g125"
                                                   value="2" onclick="skipQuestion('g125b','g125a')"
                                                   id="g125b"
                                                   required>
                                            نہیں
                                            <br>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row urdu">
                                        <div class="col-md-12">
                                            <h4>
                                                <small>g125a :</small>
                                                لیڈی ہیلتھ ورکر کا وزٹ نہیں کرنے کا سبب کیا تھاا
                                            </h4>
                                            <input type="checkbox" name="g125a"
                                                   value="1" id="g125aa" required>
                                            ایل ایچھ ڈبلیو اکثر وزت پرنہیں آتی <br>
                                            <input type="checkbox" name="g125a"
                                                   value="2" id="g125ab" required>
                                            ایل ایچھ ڈبلیوکرونا کی وجہ سےوزٹ نہیں کرسکی <br>
                                            <input type="checkbox" name="g125a"
                                                   value="3" id="g125ac" required>ایل ایچھ ڈبلیوآئی مگر ہم نے گھر میں
                                            آنے نہیں دیا <br>
                                            <input type="checkbox" name="g125a"
                                                   value="31" id="g125ad" required> ایل ایچھ ڈبلیونے ماسک نہیں پہنا ہوا
                                            تھا
                                            <br>
                                            <input type="checkbox" name="g125a"
                                                   value="32" id="g125ae" required> کرونا کا ڈریا خوف <br>
                                            <input type="checkbox" name="g125a"
                                                   value="33" id="g125af" required>سماجی مفاصلا <br>
                                            <input type="checkbox" name="g125a"
                                                   value="34" id="g125ag" required>حفاظتی سامان گھر پر موجود نہیں تھا
                                            <br>
                                        </div>
                                    </div>
                                    <hr>

                                    <p class="myheading">
                                        سیکشن ایچ :
                                        نوزائیدہ کی صحت
                                    </p>
                                    <p class="myheading2">اگلے سیکشن میں، آپ سے میں آپ کے نوزائیدہ بچے کی صحت سے متعلق
                                        چند سوال کروں
                                        گی</p>

                                    <div class="row urdu">
                                        <div class="col-md-12">
                                            <h4>
                                                <small>h125 :</small>
                                                اب میں (نام) ولادت کے بعد کیئے گیئے صحت کے معائنے سے متعلق کچھ سوالات
                                                پوچھونگی۔ (نام) کی پیدائش کے بعد، کیا کسی نے (نام) کی صحت کا معائنہ کیا
                                                تھا؟
                                            </h4>
                                            <input type="Radio" name="h125"
                                                   value="1" id="h125a" required>
                                            ہاں <br>
                                            <input type="Radio" name="h125" onclick="skipQuestion('h125b','h125a')"
                                                   value="2" id="h125b" required>
                                            نہیں <br></div>
                                    </div>
                                    <hr>
                                    <div class="row urdu">
                                        <div class="col-md-12">
                                            <h4>
                                                <small>h125a :</small>
                                                آپ نے (نام) کی پیدائش مرکز صحت پر کیوں نہیں کروائی؟ اگر زچگی گھر میں
                                                ہوئی تھی۔ کسی
                                                اور وجہ کی نشاندہی کرنے کے لئے تحقیق کریں۔ بتائے گئے تمام جوابات ریکارڈ
                                                کریں۔
                                            </h4>
                                            <input type="CheckBox" name="h125a"
                                                   value="1" id="h125aa">
                                            سواری نہیں تھی
                                            <br>
                                            <input type="CheckBox" name="h125a"
                                                   value="2" id="h125ab">
                                            ہسپتال کے عملے کا رویہ صحیح نہیں تھا
                                            <br>
                                            <input type="CheckBox" name="h125a"
                                                   value="3" id="h125ac">
                                            ہسپتال میں کام نہیں ہو رہا تھا
                                            <br>
                                            <input type="CheckBox" name="h125a"
                                                   value="4" id="h125ad">
                                            مرکز صحت بہت دور تھا
                                            <br>
                                            <input type="CheckBox" name="h125a"
                                                   value="5" id="h125ae">
                                            کوئی مرد/شوہر مرکز صحت لے جانے کے لیئے موجود نہیں تھا
                                            <br>
                                            <input type="CheckBox" name="h125a"
                                                   value="6" id="h125af">
                                            ناقص معیار کی خدمات
                                            <br>
                                            <input type="CheckBox" name="h125a"
                                                   value="7" id="h125ag">
                                            مرکز صحت میں کوئی خاتون ڈاکٹر دستیاب نہیں
                                            <br>
                                            <input type="CheckBox" name="h125a"
                                                   value="8" id="h125ah">
                                            ضروری نہیں سمجھا
                                            <br>
                                            <input type="CheckBox" name="h125a"
                                                   value="9" id="h125ai">
                                            علاج مہنگا ہے
                                            <br>
                                            <input type="CheckBox" name="h125a" value="10" id="h125aj">
                                            ہسپتال کرونا کی وجہ سے بند تھا<br>
                                            <input type="CheckBox" name="h125a" value="11" id="h125ak">
                                            کرونا کا ڈریا خوف<br>
                                            <input type="CheckBox" name="h125a" value="12" id="h125al">
                                            سماجی مفاصلہ <br>
                                            <input type="CheckBox" name="h125a" value="13" id="h125am">
                                            کرونا کے لاک ڈائون کی وجہ سے سواری نہیں تھی br>
                                            <input type="CheckBox" name="h125a" value="14" id="h125an">
                                            حفاظتی سامان (ماسک، دستانے) گھر پر موجود نہیں تھے <br>
                                            <input type="CheckBox" name="h125a" value="15" id="h125ao">
                                            ڈاکٹر احتیاطی تدابیر پر عمل نہیں کر رہا تھا (ماسک اور دستانے نہیں پہنےہوئے
                                            تھے<br>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row urdu">
                                        <div class="col-md-12">
                                            <h4>
                                                <small>h131 :</small>
                                                کیا آپ(نام) کو حفاظتی ٹیکوں کے لیے لے کر گئی تھیں؟
                                            </h4>
                                            <input type="Radio" name="h131"
                                                   value="1" id="h131a" required>
                                            ہاں <br>
                                            <input type="Radio" name="h131" onclick="skipQuestion('h131b','h131a1')"
                                                   value="2" id="h131b" required>
                                            نہیں <br></div>
                                    </div>
                                    <hr>
                                    <div class="row urdu">
                                        <div class="col-md-12">
                                            <h4>
                                                <small>h131a :</small>
                                                کیا آپ(نام) کو حفاظتی ٹیکوں کے لیے لے کر گئی تھیں؟
                                            </h4>
                                            <input type="Radio" name="h131a"
                                                   value="1" id="h131aa" required>
                                            اتنا اہم نہیں تھا <br>
                                            <input type="Radio" name="h131a"
                                                   value="2" id="h131ab" required>
                                            ہسپتال کرونا کی وجہ سے بند تھ <br>
                                            <input type="Radio" name="h131a"
                                                   value="3" id="h131ac" required>
                                            کرونا کا ڈریا خوف <br>
                                            <input type="Radio" name="h131a"
                                                   value="4" id="h131ad" required>
                                            سماجی مفاصلہ <br>
                                            <input type="Radio" name="h131a"
                                                   value="5" id="h131ae" required>
                                            کرونا کے لاک ڈائون کی وجہ سے سواری نہیں تھی <br>
                                            <input type="Radio" name="h131"
                                                   value="6" id="h131abf" required>
                                            حفاظتی سامان (ماسک، دستانے) گھر پر موجود نہیں تھے <br>
                                            <input type="Radio" name="h131a"
                                                   value="7" id="h131abg" required>
                                            ڈاکٹر احتیاطی تدابیر پر عمل نہیں کر رہا تھا (ماسک اور دستانے نہیں پہنےہوئے
                                            تھے) <br>

                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row urdu">
                                        <div class="col-md-12">
                                            <h4>
                                                <small>h132 :</small>
                                                کیانوزائیدہ کی پیدائش کے بعد ایل ایچ ڈبلیو نے دورہ کیا تھا ؟
                                            </h4>
                                            <input type="Radio" name="h132"
                                                   value="1" id="h132a" required>
                                            ہاں <br>
                                            <input type="Radio" name="h132" onclick="skipQuestion('h132b','h132a')"
                                                   value="2" id="h132b" required>
                                            نہیں <br>
                                            <input type="Radio" name="h132" onclick="skipQuestion('h132c','h132a')"
                                                   value="3" id="h132c" required>
                                            زچگی کسی اور علاقہ میں ہوئی تھی<br></div>
                                    </div>
                                    <hr>
                                    <div class="row urdu">
                                        <div class="col-md-12">
                                            <h4>
                                                <small>h132a :</small>
                                                لیڈی ہیلتھ ورکر کا وزٹ نہیں کرنے کا سبب کیا تھا؟
                                            </h4>
                                            <input type="checkbox" name="h132a"
                                                   value="1" id="h132aa" required>
                                            ایل ایچھ ڈبلیو اکثر وزت پرنہیں آتی <br>
                                            <input type="checkbox" name="h132a"
                                                   value="2" id="h132ab" required>
                                            ایل ایچھ ڈبلیوکرونا کی وجہ سےوزٹ نہیں کرسکی <br>
                                            <input type="checkbox" name="h132a"
                                                   value="3" id="h132ac" required>ایل ایچھ ڈبلیوآئی مگر ہم نے گھر میں
                                            آنے نہیں دیا <br>
                                            <input type="checkbox" name="h132a"
                                                   value="31" id="h132ad" required> ایل ایچھ ڈبلیونے ماسک نہیں پہنا ہوا
                                            تھا
                                            <br>
                                            <input type="checkbox" name="h132a"
                                                   value="32" id="h132ae" required> کرونا کا ڈریا خوف <br>
                                            <input type="checkbox" name="h132a"
                                                   value="33" id="h132af" required>سماجی مفاصلا <br>
                                            <input type="checkbox" name="h132a"
                                                   value="34" id="h132ag" required>حفاظتی سامان گھر پر موجود نہیں تھا
                                            <br>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row urdu">
                                        <div class="col-md-12">
                                            <h4>
                                                <small>h133 :</small>
                                                لیڈی ہیلتھ ورکر کا (نام) کی ولادت کے بعد آنے کا مقصد کیا تھا؟
                                            </h4>
                                            <input type="CheckBox" name="h133"
                                                   value="1" id="h133a">
                                            وزن کیاتھا<br>
                                            <input type="CheckBox" name="h133"
                                                   value="2" id="h133b">
                                            (معائنہ کیا (درجہ حرارت ، سانس کی رفتار، صحت کے بارے میں آگاہی<br>
                                            <input
                                                    type="CheckBox" name="h133"
                                                    value="3" id="h133c">
                                            صحت و صفائی اور خوراک کے بارے میں بتایا<br>
                                            <input type="CheckBox"
                                                   name="h133"
                                                   value="4" id="h133d">
                                            معمول کے معائنہ کے لئے مرکزِ صحت ریفر کیا<br>
                                            <input type="CheckBox"
                                                   name="h133"
                                                   value="5"
                                                   id="h133e">
                                            حفاظتی ٹیکے<br>
                                            <input type="CheckBox" name="h133"
                                                   value="6" id="h133f">
                                            پولیو کے قطرے پلوائے<br>
                                            <input type="CheckBox" name="h133"
                                                   value="7" id="h133g">
                                            ماں کو دودھ پلانے کا صحیح طریقہ بتایا<br>
                                            <input type="CheckBox"
                                                   name="h133"
                                                   value="8" id="h133h">
                                            خطرناک علامات کے بارے میں بتایا<br>
                                            <input type="CheckBox"
                                                   name="h133"
                                                   value="9" id="h133i">
                                            کرونا کی احتیاطی تدابیر کےبارے میں معلومات <br>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row urdu">
                                        <div class="col-md-12">
                                            <h4>
                                                <small>h137 :</small>
                                                کیا )نام( کو پیدائش کے بعد بی-سی-جی کا ٹیکہ لگا تھا؟ (عموماً بائیں
                                                بازو
                                                پر ٹیکے کا داغ رہ جاتا ہے)
                                            </h4>
                                            <input type="Radio" name="h137"
                                                   value="1" id="h137a" required>
                                            ہاں <br>
                                            <input type="Radio" name="h137" onclick="skipQuestion('137b','h137aa')"
                                                   value="2" id="h137b" required>
                                            نہیں <br></div>
                                    </div>
                                    <hr>
                                    <div class="row urdu">
                                        <div class="col-md-12">
                                            <h4>
                                                <small>h137aa :</small>
                                                کیا آپ(نام) کو حفاظتی ٹیکےکیوں نہیں لگوائے؟
                                            </h4>
                                            <input type="Radio" name="h137aa"
                                                   value="1" id="h137aaa" required>
                                            اتنا اہم نہیں تھا <br>
                                            <input type="Radio" name="h137aa"
                                                   value="2" id="h137aab" required>
                                            ہسپتال کرونا کی وجہ سے بند تھ <br>
                                            <input type="Radio" name="h137aa"
                                                   value="3" id="h137aac" required>
                                            کرونا کا ڈریا خوف <br>
                                            <input type="Radio" name="h137aa"
                                                   value="4" id="h137aad" required>
                                            سماجی مفاصلہ <br>
                                            <input type="Radio" name="h137aa"
                                                   value="5" id="h137aae" required>
                                            کرونا کے لاک ڈائون کی وجہ سے سواری نہیں تھی <br>
                                            <input type="Radio" name="h131"
                                                   value="6" id="h137aabf" required>
                                            حفاظتی سامان (ماسک، دستانے) گھر پر موجود نہیں تھے <br>
                                            <input type="Radio" name="h137aa"
                                                   value="7" id="h137aabg" required>
                                            ڈاکٹر احتیاطی تدابیر پر عمل نہیں کر رہا تھا (ماسک اور دستانے نہیں پہنےہوئے
                                            تھے) <br>

                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row urdu">
                                        <div class="col-md-12">
                                            <h4>
                                                <small>h209 :</small>
                                                کیا لیڈی ہیلتھ ورکر نےزچگی کے بعد آپ کے پاس دورہ کیا تھا؟
                                            </h4>
                                            <input type="Radio" name="h209"
                                                   value="1" id="h209a" required>
                                            ہاں <br><input type="Radio" name="h209"
                                                           onclick="skipQuestion('h209b','h209aa')"
                                                           value="2" id="h209b" required>
                                            نہیں <br></div>
                                    </div>
                                    <hr>
                                    <div class="row urdu">
                                        <div class="col-md-12">
                                            <h4>
                                                <small>h209a :</small>
                                                لیڈی ہیلتھ ورکر کا وزٹ نہیں کرنے کا سبب کیا تھا؟
                                            </h4>
                                            <input type="checkbox" name="h209a"
                                                   value="1" id="h209aa" required>
                                            ایل ایچھ ڈبلیو اکثر وزت پرنہیں آتی <br>
                                            <input type="checkbox" name="h209a"
                                                   value="2" id="h209ab" required>
                                            ایل ایچھ ڈبلیوکرونا کی وجہ سےوزٹ نہیں کرسکی <br>
                                            <input type="checkbox" name="h209a"
                                                   value="3" id="h209ac" required>ایل ایچھ ڈبلیوآئی مگر ہم نے گھر میں
                                            آنے نہیں دیا <br>
                                            <input type="checkbox" name="h209a"
                                                   value="31" id="h209ad" required> ایل ایچھ ڈبلیونے ماسک نہیں پہنا ہوا
                                            تھا
                                            <br>
                                            <input type="checkbox" name="h209a"
                                                   value="32" id="h209ae" required> کرونا کا ڈریا خوف <br>
                                            <input type="checkbox" name="h209a"
                                                   value="33" id="h209af" required>سماجی مفاصلا <br>
                                            <input type="checkbox" name="h209a"
                                                   value="34" id="h209ag" required>حفاظتی سامان گھر پر موجود نہیں تھا
                                            <br>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row urdu">
                                        <div class="col-md-12">
                                            <h4>
                                                <small>h214 :</small>
                                                کیا آپ کو عورتوں کی صحت عامہ کے بارے میں لیڈی ہیلتھ ورکر کی بات چیت
                                                کے
                                                بارے میں معلوم ہے یا کبھی آپ نے اس بات چیت میں حصہ لیا؟
                                            </h4>
                                            <input type="Radio" name="h214"
                                                   value="1" id="h214a" required>
                                            ہاں معلوم ہے<br>
                                            <input type="Radio" name="h214"
                                                   value="2" id="h214b" required>
                                            نہیں ،میں نہیں جانتی <br>
                                            <input type="Radio" name="h214"
                                                   value="3" id="h214c" required>
                                            ہاں حصہ لیا تھا <br>
                                            <input type="Radio" name="h214"
                                                   value="4" id="h214d" required>
                                            کبھی حصہ نہیں لیا<br>
                                            <input type="Radio" name="h214"
                                                   value="5" id="h214e" required>
                                            کرونا کی وجہ سے مٹینگ نہیں ہوئی<br>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row urdu">
                                        <div class="col-md-12">
                                            <h4>
                                                <small>h216 :</small>
                                                کیا آپ کے گھر کے کسی مرد نے ولیج ہیلتھ کمیٹی کی میٹنگ میں حصہ لیا
                                                ہے؟
                                            </h4>
                                            <input type="Radio" name="h216"
                                                   value="1" id="h216a" required>
                                            ہاں <br>
                                            <input type="Radio" name="h216" onclick="skipQuestion('h2146b','h216aa')"
                                                   value="2" id="h216b" required>
                                            نہیں <br>
                                            <input type="Radio" name="h216"
                                                   value="3" id="h216c" required>
                                            کبھی سنا نہیں اس کے بارے میں <br></div>
                                    </div>
                                    <hr>

                                    <div class="row urdu">
                                        <div class="col-md-12">
                                            <h4>
                                                <small>h216aa :</small>
                                                کیا آپ(نام) کو حفاظتی ٹیکےکیوں نہیں لگوائے؟
                                            </h4>
                                            <input type="Radio" name="h216aa"
                                                   value="1" id="h216aaa" required>
                                            اتنا اہم نہیں تھا <br>
                                            <input type="Radio" name="h216aa"
                                                   value="2" id="h216aab" required>
                                            ہسپتال کرونا کی وجہ سے بند تھ <br>
                                            <input type="Radio" name="h216aa"
                                                   value="3" id="h216aac" required>
                                            کرونا کا ڈریا خوف <br>
                                            <input type="Radio" name="h216aa"
                                                   value="4" id="h216aad" required>
                                            سماجی مفاصلہ <br>
                                            <input type="Radio" name="h216aa"
                                                   value="5" id="h216aae" required>
                                            کرونا کے لاک ڈائون کی وجہ سے سواری نہیں تھی <br>
                                            <input type="Radio" name="h131"
                                                   value="6" id="h216aabf" required>
                                            حفاظتی سامان (ماسک، دستانے) گھر پر موجود نہیں تھے <br>
                                            <input type="Radio" name="h216aa"
                                                   value="7" id="h216aag" required>
                                            ڈاکٹر احتیاطی تدابیر پر عمل نہیں کر رہا تھا (ماسک اور دستانے نہیں پہنےہوئے
                                            تھے) <br>

                                        </div>
                                    </div>
                                    <hr>
                                    <p class="myheading">
                                        سیکشن آئی- بچوں کی
                                        صحت
                                    </p>
                                    <p class="myheading2">تعلق کچھ سوالات کرونگا/کرونگی۔ (ARI)اب میں آپ سے آپ کے گھر
                                        میں موجود پانچ سال
                                        سے کم عمر بچوں میں دست(ڈائریا) اور نظام تنفس کے شدید انفیکشن </p>


                                    <div class="row urdu">
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
                                                   value="1" id="i101a" required>
                                            ہاں <br>
                                            <input type="Radio" name="i101" onclick="skipQuestion('i101b','i207')"
                                                   value="2" id="i101b" required>
                                            نہیں <br></div>
                                    </div>
                                    <hr>

                                    <div class="row urdu">
                                        <div class="col-md-12">
                                            <h4>
                                                <small>i105 :</small>
                                                (نام) کو دستوں کی تکلیف ہونے پر کیا آپ نے علاج کروایا تھا؟
                                            </h4>
                                            <input type="Radio" name="i105" onclick="skipQuestion('i105a','i125')"
                                                   value="1" id="i105a" required>
                                            ہاں <br><input type="Radio" name="i105"
                                                           onclick="skipQuestion('i105b','i106')"
                                                           value="2" id="i105b" required>
                                            نہیں <br></div>
                                    </div>
                                    <hr>
                                    <div class="row urdu">
                                        <div class="col-md-12">
                                            <h4>
                                                <small>i106 :</small>
                                                (نام) کو دستوں کی تکلیف ہونے پر آپ نے کیوں علاج نہیں کروایا ؟
                                            </h4>
                                            <input type="Radio" name="i106"
                                                   value="1" id="i106a" required>
                                            اس مسئلے کے لیے علاج کروانے کی ضرورت نہیں تھی <br>
                                            <input type="Radio"
                                                   name="i106"
                                                   value="2"
                                                   id="i106b"
                                                   required>
                                            صحت فراہم کرنے والے کو دینے کے لیے پیسے نہیں تھے<br>
                                            <input type="Radio"
                                                   name="i106"
                                                   value="3"
                                                   id="i106c"
                                                   required>
                                            ٹرانسپورٹ دستیاب نہیں تھی<br>
                                            <input type="Radio" name="i106"
                                                   value="4" id="i106d" required>
                                            کوئی مرد گھر پر موجود نہیں تھا جو مرکزِ صحت تک لے جاتا<br>
                                            <input
                                                    type="Radio" name="i106"
                                                    value="5" id="i106e" required>
                                            گھر کے سربراہ/شوہر/ساس نے اجازت نہیں دی<br>
                                            <input type="Radio"
                                                   name="i106"
                                                   value="6" id="i106f"
                                                   required>
                                            مرکزِصحت بہت دور تھا<br>
                                            <br>
                                            <input type="Radio" name="i106" value="7" id="i106j">
                                            ہسپتال کرونا کی وجہ سے بند تھا<br>
                                            <input type="Radio" name="i106" value="8" id="i106k">
                                            کرونا کا ڈریا خوف<br>
                                            <input type="Radio" name="i106" value="9" id="i106l">
                                            سماجی مفاصلہ <br>
                                            <input type="Radio" name="i106" value="10" id="i106m">
                                            کرونا کے لاک ڈائون کی وجہ سے سواری نہیں تھی br>
                                            <input type="Radio" name="i106" value="11" id="i106n">
                                            حفاظتی سامان (ماسک، دستانے) گھر پر موجود نہیں تھے <br>
                                            <input type="Radio" name="i106" value="12" id="i106o">
                                            ڈاکٹر احتیاطی تدابیر پر عمل نہیں کر رہا تھا (ماسک اور دستانے نہیں پہنےہوئے
                                            تھے<br>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row urdu">
                                        <div class="col-md-12">
                                            <h4>
                                                <small>i125 :</small>
                                                کیا لیڈی ہیلتھ ورکر نے (نام) کے دستوں کی تکلیف کے دوران آپ کے گھر کا
                                                وزٹ
                                                کیا تھا ؟
                                            </h4>
                                            <input type="Radio" name="i125"
                                                   value="1" id="i125a" required>
                                            ہاں <br>
                                            <input type="Radio" name="i125" onclick="skipQuestion('i125b','i125aa')"
                                                   value="2" id="i125b" required>
                                            نہیں <br></div>
                                    </div>
                                    <hr>

                                    <p class="myheading">
                                        سیکشن جے: حفاظتی
                                        ٹیکے
                                    </p>
                                    <p class="myheading2">اگر حفاظتی ٹیکوں کا کارڈ موجود ہے، تو حفاظتی ٹیکوں کے کارڈ سے
                                        ٹیکے لگنے کی تمام
                                        تاریخیں درج کرلیں۔ حفاظتی ٹیکوں کے کارڈ کی عدم موجودگی کی صورت میں، زبانی بتائی
                                        گئیں تاریخوں کے بارے میں معلومات درج کریں۔ بچے کی عمر( 12 سے 23 مہینے) ، اگر ایک
                                        سے زیادہ بچے ہیں تو سب سے کم عمر والے بچے کو منتخب کریں</p>


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
                                            <input type="Radio" name="j108"
                                                   value="1" id="j108a" required>
                                            ہاں<br>
                                            <input type="Radio" name="j108" onclick="skipQuestion('j108b','j123')"
                                                   value="2" id="j108b" required>
                                            نہیں<br>
                                            <input type="Radio" name="j108"
                                                   value="98" id="j108c" required>
                                            معلوم نہیں<br></div>
                                    </div>
                                    <hr>

                                    <div class="row urdu">
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
                                            <input type="CheckBox" name="j123"
                                                   value="1" id="j123a">
                                            حفاظتی ٹیکوں کا مرکزبہت دور تھا<br>
                                            <input type="CheckBox" name="j123"
                                                   value="2" id="j123b">
                                            حفاظتی ٹیکے لگوانے کا وقت مناسب نہیں تھا<br>
                                            <input type="CheckBox"
                                                   name="j123"
                                                   value="3" id="j123c">
                                            ماں مصروف تھی<br>
                                            <input type="CheckBox" name="j123"
                                                   value="4" id="j123d">
                                            ماں کی بیماری سمیت، خاندانی مسائل<br>
                                            <input type="CheckBox" name="j123"
                                                   value="5" id="j123e">
                                            بچہ بیمار تھا،لے کر نہیں گئے<br>
                                            <input type="CheckBox" name="j123"
                                                   value="6" id="j123f">
                                            بچہ بیمار تھا،لے کر گئےتھےلیکن ویکسین نہیں لگوائی<br>
                                            <input
                                                    type="CheckBox"
                                                    name="j123"
                                                    value="7"
                                                    id="j123g">
                                            طویل انتظار کرنے کی وجہ سے نہیں لگوائی<br>
                                            <input type="CheckBox"
                                                   name="j123"
                                                   value="8" id="j123h">
                                            افواہوں کی وجہ سے نہیں لگوائی<br>
                                            <input type="CheckBox" name="j123"
                                                   value="9" id="j123i">
                                            حفاظتی ٹیکے لگوانے پر یقین نہیں ہے<br>
                                            <input type="CheckBox" name="j123"
                                                   value="10" id="j123j">
                                            ضمنی اثرات کا خوف<br><input type="CheckBox" name="j123"
                                                                        value="11" id="j123k">
                                            حفاظتی ٹیکے لگوانے کی جگہ اور وقت معلوم نہیں تھا<br>
                                            <input
                                                    type="CheckBox"
                                                    name="j123"
                                                    value="12"
                                                    id="j123l">
                                            بچے کو لے کر گئےلیکن ویکسین نہیں تھی<br>
                                            <input type="CheckBox"
                                                   name="j123"
                                                   value="13" id="j123m">
                                            بچے کو لے کر گئے لیکن ویکسین لگانے والا اسٹاف نہیں تھا<br>
                                            <input
                                                    type="CheckBox" name="j123"
                                                    value="14" id="j123n">
                                            بچے کو لے کر گئے لیکن حفاظتی ٹیکوں کا مرکز بند تھا<br>
                                            <input
                                                    type="CheckBox"
                                                    name="j123"
                                                    value="15"
                                                    id="j123o">
                                            بچہ بیمار تھا<br>
                                            <input type="CheckBox" name="j123"
                                                   value="16" id="j123p">
                                            بچے کو لے کر گئے لیکن ٹیکے لگانے کا دن نہیں تھا<br>
                                            <input type="CheckBox" name="j123"
                                                   value="17" id="j123p">
                                            ہسپتال کرونا کی وجہ سے بند تھا<br>
                                            <input type="CheckBox" name="j123"
                                                   value="18" id="j123p">
                                            کرونا کا ڈریا خوف<br>
                                            <input type="CheckBox" name="j123"
                                                   value="19" id="j123p">
                                            سماجی مفاصلہ<br>
                                            <input type="CheckBox" name="j123"
                                                   value="20" id="j123p">
                                            کرونا کے لاک ڈائون کی وجہ سے سواری نہیں تھی
                                            حفاظتی سامان (ماسک، دستانے) گھر پر موجود نہیں تھے<br>
                                            <input type="CheckBox" name="j123"
                                                   value="21" id="j123p">کرونا کے لاک ڈائون کی وجہ سے سواری نہیں تھی
                                            تھے)<br>
                                            <input type="CheckBox" name="j123"
                                                   value="22" id="j123p"> حفاظتی سامان (ماسک، دستانے) گھر پر موجود نہیں
                                            تھے<br>

                                            <input type="CheckBox" name="j123"
                                                   value="96" id="j123p">
                                            دیگر(وضاحت کریں) <br>
                                            <input type="CheckBox" name="j123"
                                                   value="98" id="j123p">
                                            معلوم نہیں<br>
                                        </div>
                                    </div>
                                    <hr>
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
                                            <input type="Radio" name="k107"
                                                   value="1" id="k107a" required>
                                            ہاں<br>
                                            <input type="Radio" name="k107" onclick="skipQuestion('k107b','k107aa')"
                                                   value="2" id="k107b" required>
                                            نہیں<br></div>
                                    </div>
                                    <hr>
                                    <div class="row urdu">
                                        <div class="col-md-12">
                                            <h4>
                                                <small>k107aa :</small>
                                                لیڈی ہیلتھ ورکر کا وزٹ نہیں کرنے کا سبب کیا تھا؟
                                            </h4>
                                            <input type="checkbox" name="k107aa"
                                                   value="1" id="k107aaa" required>
                                            ایل ایچھ ڈبلیو اکثر وزت پرنہیں آتی <br>
                                            <input type="checkbox" name="k107aa"
                                                   value="2" id="k107aab" required>
                                            ایل ایچھ ڈبلیوکرونا کی وجہ سےوزٹ نہیں کرسکی <br>
                                            <input type="checkbox" name="k107aa"
                                                   value="3" id="k107aac" required>ایل ایچھ ڈبلیوآئی مگر ہم نے گھر میں
                                            آنے نہیں دیا <br>
                                            <input type="checkbox" name="k107aa"
                                                   value="31" id="k107aad" required> ایل ایچھ ڈبلیونے ماسک نہیں پہنا ہوا
                                            تھا
                                            <br>
                                            <input type="checkbox" name="k107aa"
                                                   value="32" id="k107aae" required> کرونا کا ڈریا خوف <br>
                                            <input type="checkbox" name="k107aa"
                                                   value="33" id="k107aaf" required>سماجی مفاصلا <br>
                                            <input type="checkbox" name="k107aa"
                                                   value="34" id="k107aag" required>حفاظتی سامان گھر پر موجود نہیں تھا
                                            <br>
                                        </div>
                                    </div>
                                    <hr>
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
                                            <input type="Radio" name="o108"
                                                   value="1" id="o108a" required>
                                            مکمل <br>
                                            <input type="Radio" name="o108"
                                                   value="2" id="o108b" required>
                                            انکار کردیا<br>
                                            <input type="Radio" name="o108"
                                                   value="3" id="o108c" required>
                                            رہائش مستقل طور پر بند ہے <br>
                                            <input type="Radio" name="o108"
                                                   value="4" id="o108d" required>
                                            رہائش عارضی طور پر بند ہے<br>
                                            <input type="Radio" name="o108"
                                                   value="5" id="o108e" required>
                                            التواع<br>
                                            <input type="Radio" name="o108"
                                                   value="6" id="o108f" required>
                                            رہائش گاہ خالی ہے <br>
                                            <input type="Radio" name="o108"
                                                   value="7" id="o108g" required>
                                            نا مکمل<br>
                                            <input type="Radio" name="o108"
                                                   value="8" id="o108h" required>
                                            کرونا کی بیماری کی وجہ سےجوب نہیں ملا<br>
                                            <input type="Radio" name="o108"
                                                   value="96" id="o108i" required>
                                            دیگر وضاحت کریں<br>
                                        </div>
                                    </div>
                                    <hr>

                                    <p>آپ کے وقت دینے کا بہت شکریہ۔ آپ نے جو معلومات فراہم کی ہیں، وہ ہمیں صحت کی خدمات
                                        کے پروگرام کو ڈیزائن کرنے میں مدد گار ثابت ہونگی۔آپ ہم سے سینٹر آف ایکسیلینس
                                        وومن اینڈ چائلڈ ہیلتھ آغا خان یونیورسٹی کے آفس پر رابطہ کر سکتے ہیں۔( ضلعی
                                        مینیجرز کے رابطے کی تفصیلات سے متعلق معلومات فراہم کریں)۔

                                    </p>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group  ">
                                                <label for="remarks" class="urdu">ریمارکس </label>
                                                <textarea name="remarks" id="remarks" cols="75" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <?php echo form_submit('submit', "Register User", 'class="btn btn-primary"'); ?>
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