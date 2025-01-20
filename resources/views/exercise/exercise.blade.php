@extends('layouts2.app')
@section('content')
    <div class="container">
        <section class="content-header">
            <div class="row">
                <div class="col-xs-12">
                    <h1>
                    Latihan
                    <br>
                    </h1>
                    <p>Latihan untuk pembelajaran siswa</p>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/dashboard-v3') }}"><i class="fa fa-dashboard"></i> Beranda</a></li>
                        <li class="active"><a href="#">Latihan</a></li>
                    </ol>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
            
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Latihan</h3>
                            <hr>
                            @if (Auth::user()->role_id == 3) 
                                <a href="{{ url('/exercise/add') }}">
                                    <button class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add Exercise</button>
                                </a>
                            @endif
                        </div>
                       
                        <div class="box-body">
                            <div class="col-md-12 text-center" id="btnStart">
                                {{-- Auth::user()->role_id --}}
                                <p style="margin-top:-30px;margin-bottom:50px;"> 
                                1) Soal harus dijawab semua </br>
                                2) Tidak ada batasan waktu </br>
                                3) Nilai tidak mempengaruhi penilaian sekolah (hanya untuk penelitian) </br>
                                4) Kerjakan masing-masing, tidak mencontek orang lain atau sumber lainnya </br>
                                5) Jika mendapatkan nilai rendah (kurang dari B), wajib mengulangi lagi latihan </br>
                                6) Selamat mengerjakan                                  </br>
                                </p>
                                <button type="submit" class="btn btn-primary" onclick="startQuestion()">MULAI</button>
                            </div>
                            @foreach ($dataUser as $itemA)
                            <input type="hidden" id="id_student" value="{{ $itemA->id_student }}">
                            <input type="hidden" id="id_question_package" value="{{ $itemA->id_question_type }}">
                            
                            
                            @endforeach
                            <div class="col-md-12" id="question" style="display:none;">
                               <input type="hidden" value={{ sizeof($data) }} id="totalQuestion">
                                <?php $i =1; $len = sizeof($data);?>
                                @foreach ($data as $item)
                                    <div class="form-group">
                                        <div class="col-md-12" id="rad{{$i}}">
                                            {{ $i . ". "}}
                                            @foreach ($item["question"] as $q)
                                                {{ $q}}
                                                {{-- {{ $q[1] }} --}}
                                            @endforeach 
                                            <br><br>
                                            <div class="radio" >
                                                @foreach ($item["answer"] as $it)
                                                    <input type="radio" name="answer{{$i}}" value="{{ $it->code}};{{$item["qCode"]}}" > {{ $it->res }} {{-- {{ $it->code }} --}}
                                                    <br>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 text-center" id="btnSubmit" style="display:none;" >
                                        <button type="submit" name="btnFinish" class="btn btn-primary" onclick="finishQuestion()" id="btnFinish">SELESAI</button>
                                        {{-- <div id="basicUsage">00:00:00</div> --}}
                                    </div>
                                    <?php $i++?>
            
                                @endforeach
                            </div>
                            <div class="col-md-12 text-center" >
                                <p id="nilai"></p>
                                {{-- please change to notif if needed --}}
                                <p id="notifa"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src=" {{ asset ('js/easytimer/dist/easytimer.min.js')}}"></script>

<script type="text/javascript">
    let inputQuestion = {};
    let idCommits;
    let idPackage;
    let idLastCommit = 0;
    // let question1;
    var timer = new easytimer.Timer();
    var time;
    var totalQuestion = 0;
    var timeQ = new easytimer.Timer();
    var timePerQuestion;
    function startQuestion() {
        $("#btnStart").css({ display: "none" });
        $("#question").removeAttr("style");

            // var timer = new Timer();
        timer.start();
        timer.addEventListener('secondsUpdated', function (e) {
            // console.log(timer.getTimeValues().toString())
            time = timer.getTimeValues().toString()
            $('#basicUsage').html(timer.getTimeValues().toString());
        });

        timeQ.start();
        timeQ.addEventListener('secondsUpdated', function (e) {
            timePerQuestion = timeQ.getTimeValues().toString()
        });

        
        let dataArr = { "id_question_package" : $("#id_question_package").val(), "id_student" : $("#id_student").val()};
        totalQuestion = $('#totalQuestion').val();
        $.ajax({
            type: "POST",
            url: '{!! url("/exercise/commit") !!}',
            // processData: true,
            // data: dataArr,
            data: JSON.stringify(dataArr),
            // dataType: 'json',
            contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            success: function(data) { 
                idCommits = data.id;
                idPackage = data.id_question_package;
                if (data.id_last_commit) {
                    idLastCommit = data.id_last_commit;
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(textStatus);
            }
        });
    }

    
    var q1 = {},
    q2 = {},
    q3 = {},
    q4 = {},
    q5 = {},
    q6 = {},
    q7 = {},
    q8 = {},
    q9 = {},
    q10 = {},
    q11 = {},
    q12 = {},
    q13 = {},
    q14 = {},
    q15 = {},
    q16 = {},
    q17 = {},
    q18 = {},
    q19 = {},
    q20 = {},
    q21 = {},
    q21 = {},
    q22 = {},
    q23 = {},
    q24 = {},
    q25 = {},
    q26 = {},
    q26 = {},
    q27 = {},
    q28 = {},
    q29 = {};

    $(document).ready(function(){

        for (let i = 2; i <= 20; i++) {
            $("#rad"+i).hide();
        }
       

        $("input[name=answer1]").click(function(){
            let question1 = $('input[name=answer1]:checked').val();
            let foo1 = question1.split(";")
            let timeLocal = stopTimeQuestion()

            $("#rad2").show();
            $("#rad1").hide();
            q1 = {
             'qCode' : foo1[1],
             'miscCode' : foo1[0],
             'timeQ' : timeLocal
            } 
            if (totalQuestion == 1) {
                $("#btnSubmit").show();            
            }

        });
        $("input[name=answer2]").click(function(){
            let question2 = $('input[name=answer2]:checked').val();
            let foo2 = question2.split(";")
            let timeLocal = stopTimeQuestion()
            $("#rad3").show();
            $("#rad2").hide();
            q2 = {
             'qCode' : foo2[1],
             'miscCode' : foo2[0],
             'timeQ' : timeLocal

            }

            if (totalQuestion == 2) {
                $("#btnSubmit").show();            
            }

        });
        $("input[name=answer3]").click(function(){
            let question3 = $('input[name=answer3]:checked').val();
            let foo3 = question3.split(";")
            let timeLocal = stopTimeQuestion()

            $("#rad4").show();
            $("#rad3").hide();
            q3 = {
             'qCode' : foo3[1],
             'miscCode' : foo3[0],
             'timeQ' : timeLocal

            } 
            if (totalQuestion == 3) {
                $("#btnSubmit").show();            
            }

        });
        $("input[name=answer4]").click(function(){
            let question4 = $('input[name=answer4]:checked').val();
            let foo4 = question4.split(";")
            let timeLocal = stopTimeQuestion()
            $("#rad5").show();
            $("#rad4").hide();
            q4 = {
             'qCode' : foo4[1],
             'miscCode' : foo4[0],
             'timeQ' : timeLocal
            }
            if (totalQuestion == 4) {
                $("#btnSubmit").show();            
            }
        });
        $("input[name=answer5]").click(function(){
            let question5 = $('input[name=answer5]:checked').val();
            let foo5 = question5.split(";")
            let timeLocal = stopTimeQuestion()

            $("#rad6").show();
            $("#rad5").hide();
            q5 = {
             'qCode' : foo5[1],
             'miscCode' : foo5[0],
             'timeQ' : timeLocal

            }
            if (totalQuestion == 5) {
                $("#btnSubmit").show();            
            }
        });
        $("input[name=answer6]").click(function(){
            let question6 = $('input[name=answer6]:checked').val();
            let foo6 = question6.split(";")
            let timeLocal = stopTimeQuestion()

            $("#rad7").show();
            $("#rad6").hide();
            q6 = {
             'qCode' : foo6[1],
             'miscCode' : foo6[0],
             'timeQ' : timeLocal

            } 
            if (totalQuestion == 6) {
                $("#btnSubmit").show();            
            }
        });
        $("input[name=answer7]").click(function(){
            let question7 = $('input[name=answer7]:checked').val();
            let foo7 = question7.split(";")
            let timeLocal = stopTimeQuestion()

            $("#rad8").show();
            $("#rad7").hide();
            q7 = {
             'qCode' : foo7[1],
             'miscCode' : foo7[0],
             'timeQ' : timeLocal

            } 
            if (totalQuestion == 7) {
                $("#btnSubmit").show();            
            }
        });
        $("input[name=answer8]").click(function(){
            let question8 = $('input[name=answer8]:checked').val();
            let foo8 = question8.split(";")
            let timeLocal = stopTimeQuestion()

            $("#rad9").show();
            $("#rad8").hide();
            q8 = {
             'qCode' : foo8[1],
             'miscCode' : foo8[0],
             'timeQ' : timeLocal

            } 
            if (totalQuestion == 8) {
                $("#btnSubmit").show();            
            }
        });
        $("input[name=answer9]").click(function(){
            let question9 = $('input[name=answer9]:checked').val();
            let foo9 = question9.split(";")
            let timeLocal = stopTimeQuestion()

            $("#rad10").show();
            $("#rad9").hide();
            q9 = {
             'qCode' : foo9[1],
             'miscCode' : foo9[0],
             'timeQ' : timeLocal

            } 
            if (totalQuestion == 9) {
                $("#btnSubmit").show();            
            }
        });
        $("input[name=answer10]").click(function(){
            let question10 = $('input[name=answer10]:checked').val();
            let foo10 = question10.split(";")
            let timeLocal = stopTimeQuestion()

            $("#rad11").show();
            $("#rad10").hide();
            q10 = {
             'qCode' : foo10[1],
             'miscCode' : foo10[0],
             'timeQ' : timeLocal

            } 
            if (totalQuestion == 10) {
                $("#btnSubmit").show();            
            }

        });
        $("input[name=answer11]").click(function(){
            let question11 = $('input[name=answer11]:checked').val();
            let foo11 = question11.split(";")
            let timeLocal = stopTimeQuestion()

            $("#rad12").show();
            $("#rad11").hide();
            q11 = {
             'qCode' : foo11[1],
             'miscCode' : foo11[0],
             'timeQ' : timeLocal

            } 
            if (totalQuestion == 11) {
                $("#btnSubmit").show();            
            }
        });
        $("input[name=answer12]").click(function(){
            let question = $('input[name=answer12]:checked').val();
            let foo = question.split(";")
            let timeLocal = stopTimeQuestion()

            $("#rad13").show();
            $("#rad12").hide();
            q12 = {
             'qCode' : foo[1],
             'miscCode' : foo[0],
             'timeQ' : timeLocal

            } 
            if (totalQuestion == 12) {
                $("#btnSubmit").show();            
            }
        });
        $("input[name=answer13]").click(function(){
            let question = $('input[name=answer13]:checked').val();
            let foo = question.split(";")
            let timeLocal = stopTimeQuestion()

            $("#rad14").show();
            $("#rad13").hide();
            q13 = {
             'qCode' : foo[1],
             'miscCode' : foo[0],
             'timeQ' : timeLocal

            } 
            if (totalQuestion == 13) {
                $("#btnSubmit").show();            
            }
        });
        $("input[name=answer14]").click(function(){
            let question = $('input[name=answer14]:checked').val();
            let foo = question.split(";")
            let timeLocal = stopTimeQuestion()

            $("#rad15").show();
            $("#rad14").hide();
            q14 = {
             'qCode' : foo[1],
             'miscCode' : foo[0],
             'timeQ' : timeLocal

            } 
            if (totalQuestion == 14) {
                $("#btnSubmit").show();            
            }
        });
        $("input[name=answer15]").click(function(){
            let question = $('input[name=answer15]:checked').val();
            let foo = question.split(";")
            let timeLocal = stopTimeQuestion()

            $("#rad16").show();
            $("#rad15").hide();
            q15 = {
             'qCode' : foo[1],
             'miscCode' : foo[0],
             'timeQ' : timeLocal

            } 
            if (totalQuestion == 15) {
                $("#btnSubmit").show();            
            }
        });
        $("input[name=answer16]").click(function(){
            let question = $('input[name=answer16]:checked').val();
            let foo = question.split(";")
            let timeLocal = stopTimeQuestion()

            $("#rad17").show();
            $("#rad16").hide();
            q16 = {
             'qCode' : foo[1],
             'miscCode' : foo[0],
             'timeQ' : timeLocal

            } 
            if (totalQuestion == 16) {
                $("#btnSubmit").show();            
            }
        });
        $("input[name=answer17]").click(function(){
            let question = $('input[name=answer17]:checked').val();
            let foo = question.split(";")
            let timeLocal = stopTimeQuestion()

            $("#rad18").show();
            $("#rad17").hide();
            q17 = {
             'qCode' : foo[1],
             'miscCode' : foo[0],
             'timeQ' : timeLocal

            } 
            if (totalQuestion == 17) {
                $("#btnSubmit").show();            
            }
        });
        $("input[name=answer18]").click(function(){
            let question = $('input[name=answer18]:checked').val();
            let foo = question.split(";")
            let timeLocal = stopTimeQuestion()

            $("#rad19").show();
            $("#rad18").hide();
            q18 = {
             'qCode' : foo[1],
             'miscCode' : foo[0],
             'timeQ' : timeLocal

            } 
            if (totalQuestion == 18) {
                $("#btnSubmit").show();            
            }
        });
        $("input[name=answer19]").click(function(){
            let question = $('input[name=answer19]:checked').val();
            let foo = question.split(";")
            let timeLocal = stopTimeQuestion()

            $("#rad20").show();
            $("#rad19").hide();
            q19 = {
             'qCode' : foo[1],
             'miscCode' : foo[0],
             'timeQ' : timeLocal

            } 
            if (totalQuestion == 19) {
                $("#btnSubmit").show();            
            }
        });
        $("input[name=answer20]").click(function(){
            let question = $('input[name=answer20]:checked').val();
            let foo = question.split(";")
            let timeLocal = stopTimeQuestion()

            $("#rad21").show();
            $("#rad20").hide();
            q20 = {
             'qCode' : foo[1],
             'miscCode' : foo[0],
             'timeQ' : timeLocal

            } 
            if (totalQuestion == 20) {
                $("#btnSubmit").show();            
            }
        });
        $("input[name=answer21]").click(function(){
            let question = $('input[name=answer21]:checked').val();
            let foo = question.split(";")
            let timeLocal = stopTimeQuestion()

            $("#rad22").show();
            $("#rad21").hide();
            q21 = {
             'qCode' : foo[1],
             'miscCode' : foo[0],
             'timeQ' : timeLocal

            } 
            if (totalQuestion == 21) {
                $("#btnSubmit").show();            
            }
        });
        $("input[name=answer22]").click(function(){
            let question = $('input[name=answer22]:checked').val();
            let foo = question.split(";")
            let timeLocal = stopTimeQuestion()

            $("#rad23").show();
            $("#rad22").hide();
            q22 = {
             'qCode' : foo[1],
             'miscCode' : foo[0],
             'timeQ' : timeLocal

            } 
            if (totalQuestion == 22) {
                $("#btnSubmit").show();            
            }
        });
        $("input[name=answer23]").click(function(){
            let question = $('input[name=answer23]:checked').val();
            let foo = question.split(";")
            let timeLocal = stopTimeQuestion()

            $("#rad24").show();
            $("#rad23").hide();
            q23 = {
             'qCode' : foo[1],
             'miscCode' : foo[0],
             'timeQ' : timeLocal

            } 
            if (totalQuestion == 23) {
                $("#btnSubmit").show();            
            }
        });
        $("input[name=answer24]").click(function(){
            let question = $('input[name=answer24]:checked').val();
            let foo = question.split(";")
            let timeLocal = stopTimeQuestion()

            $("#rad25").show();
            $("#rad24").hide();
            q24 = {
             'qCode' : foo[1],
             'miscCode' : foo[0],
             'timeQ' : timeLocal

            } 
            if (totalQuestion == 24) {
                $("#btnSubmit").show();            
            }
        });
        $("input[name=answer25]").click(function(){
            let question = $('input[name=answer25]:checked').val();
            let foo = question.split(";")
            let timeLocal = stopTimeQuestion()

            $("#rad26").show();
            $("#rad25").hide();
            q25 = {
             'qCode' : foo[1],
             'miscCode' : foo[0],
             'timeQ' : timeLocal

            } 
            if (totalQuestion == 25) {
                $("#btnSubmit").show();            
            }
        });
        $("input[name=answer26]").click(function(){
            let question = $('input[name=answer26]:checked').val();
            let foo = question.split(";")
            let timeLocal = stopTimeQuestion()

            $("#rad27").show();
            $("#rad26").hide();
            q26 = {
             'qCode' : foo[1],
             'miscCode' : foo[0],
             'timeQ' : timeLocal

            } 
            if (totalQuestion == 26) {
                $("#btnSubmit").show();            
            }
        });
        $("input[name=answer27]").click(function(){
            let question = $('input[name=answer27]:checked').val();
            let foo = question.split(";")
            let timeLocal = stopTimeQuestion()

            $("#rad28").show();
            $("#rad27").hide();
            q27 = {
             'qCode' : foo[1],
             'miscCode' : foo[0],
             'timeQ' : timeLocal

            } 
            if (totalQuestion == 27) {
                $("#btnSubmit").show();            
            }
        });
        $("input[name=answer28]").click(function(){
            let question = $('input[name=answer28]:checked').val();
            let foo = question.split(";")
            let timeLocal = stopTimeQuestion()

            $("#rad29").show();
            $("#rad28").hide();
            q28 = {
             'qCode' : foo[1],
             'miscCode' : foo[0],
             'timeQ' : timeLocal

            } 
            if (totalQuestion == 28) {
                $("#btnSubmit").show();            
            }
        });
        $("input[name=answer29]").click(function(){
            let question = $('input[name=answer29]:checked').val();
            let foo = question.split(";")
            let timeLocal = stopTimeQuestion()

            $("#rad29").hide();
            q29 = {
             'qCode' : foo[1],
             'miscCode' : foo[0],
             'timeQ' : timeLocal

            } 
            if (totalQuestion == 29) {
                $("#btnSubmit").show();            
            }
        });

       
    });

    function startTimeQuestion() {
        timeQ.start()
        timeQ.addEventListener('secondsUpdated', function (e) {
            timePerQuestion = timeQ.getTimeValues().toString()
        });
    }

    function stopTimeQuestion() {
        let timeQuestion = timePerQuestion;
        timeQ.stop()
        timeQ.reset()
        return timeQuestion;
    }
    
    let nilai;
    function finishQuestion() {
        $('#btnFinish').prop('disabled', true);
        timeQ.stop();
        let data = {
            'id_question_package' : idPackage,
            'id_exercise_commits' : idCommits,
            'id_last_commit' : idLastCommit,
            'timer' : time,
            'total_question' : totalQuestion,
        }
       
            inputQuestion = {
                'q1' : q1,
                'q2' : q2,
                'q3' : q3,
                'q4' : q4,
                'q5' : q5,
                'q6' : q6,
                'q7' : q7,
                'q8' : q8,
                'q9' : q9,
                'q10' : q10,
                'q11' : q11,
                'q12' : q12,
                'q13' : q13,
                'q14' : q14,
                'q15' : q15,
                'q16' : q16,
                'q17' : q17,
                'q18' : q18,
                'q19' : q19,
                'q20' : q20,
                'q21' : q21,
                'q22' : q22,
                'q23' : q23,
                'q24' : q24,
                'q25' : q25,
                'q26' : q26,
                'q27' : q27,
                'q28' : q28,
                'q29' : q29,
            }
            let dataParams = {
                'data' : data,
                'question' : inputQuestion,
            }
            $.ajax({
                type: "POST",
                url: '{!! url("/exercise/result") !!}',
                // processData: true,
                // data: dataArr,
                data: JSON.stringify(dataParams),
                // dataType: 'json',
                contentType: 'application/json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                success: function(data) { 
                    score = data.score
                    grade = data.grade
                    competency = data.competency
                    question = data.id_question_package
                    if (question == 4 || question == 5) {
                        $("#nilai").html("Hei "+data.name +" anda mendapat nilai "+ data.grade +" pada test eksponen matematika ");
                        $("#notif").html("Anda wajib mengikuti latihan untuk meningkatkan nilai.  "+
                        " Jika ingin mengerjakan latihan kembali, pilih menu <a href='/exercise'> <b>latihan</b> </a>"+
                        " Jika ingin belajar terlebih dahulu, pilih menu <a href='/material'> <b>materi</b> </a> ")
                    } else {
                        $("#nilai").html("Hei "+data.name +" anda mendapat nilai "+ data.grade +" pada latihan eksponen matematika ke "+ data.attempt);
                        if (competency == "3") {
                            if (grade == "A" || grade == "B") {
                                $("#notif").html("Selamat anda lulus latihan eksponen matematika");
                            } else {
                            $("#notif").html("Anda wajib mengulangi latihan untuk meningkatkan nilai.  "+
                            " Jika ingin mengerjakan latihan kembali, pilih menu <a href='/exercise'> <b>latihan</b> </a>"+
                            " Jika ingin belajar terlebih dahulu, pilih menu <a href='/material'> <b>materi</b> </a> ")
                            }
                        } else {
                            $("#notif").html("Anda wajib mengulangi latihan untuk meningkatkan nilai.  "+
                            " Jika ingin mengerjakan latihan kembali, pilih menu <a href='/exercise'> <b>latihan</b> </a>"+
                            " Jika ingin belajar terlebih dahulu, pilih menu <a href='/material'> <b>materi</b> </a> ")

                        }
                    }
                    $("#question").css({ display: "none" });
                    $("#btnFinish").css({ display: "none" });
                    timer.stop();
                },
                error: function (xhr, status, error) {
                   alert(JSON.parse(xhr.responseText).message)
                }
            });
         
    }
    

</script>
{{-- uncomment to activate pagination --}}


<script type="text/javascript">

// $(document).ready(function() {
//     var $pagination = $('#pagination'),
//     totalRecords = 0,
//     records = [],
//     displayRecords = [],
//     recPerPage = 1,
//     page = 1,
//     totalPages = 0;

//     $.ajax({
//         type: "GET",
//         url: '{!! url("exercise/data") !!}',
//         contentType: "json",
//         processData: true,
//         async: false,
//         success: function(data, textStatus, jqXHR) {
//             records = data.data;
//             totalRecords = records.length;
//             totalPages = Math.ceil(totalRecords / recPerPage)
//             apply_pagination();
//         }
//         // ,
//         // error: function (jqXHR, textStatus, errorThrown) {
//         //     alert(textStatus);
//         // }
//     });


//     function generate_table() {
//         var tr;
//         $('#emp_body').html('');
//         for (var i = 0; i < displayRecords.length; i++) {
//                 tr = $('<tr/>');
//                 tr.append("<td>" + displayRecords[i].question + "</td>");
//                 for (var j = 0; j < displayRecords[i].answer.length; j++) {
//                     tr.append("<input type='radio' id='huey' name='drone' value='huey'>" + displayRecords[i].answer[j].res);
                    
//                 }
//                 $('#emp_body').append(tr);
//         }
//     }

//     function apply_pagination() {
//         $pagination.twbsPagination({
//             totalPages: totalPages,
//             visiblePages: 1,
//             first: '',
//             prev: '',
//             // next: '',
//             last: '',
//             onPageClick: function (event, page) {
//                 displayRecordsIndex = Math.max(page - 1, 0) * recPerPage;
//                 endRec = (displayRecordsIndex) + recPerPage;
                
//                 displayRecords = records.slice(displayRecordsIndex, endRec);
//                 generate_table();
//             }
//         });
//     }
// });
</script>
