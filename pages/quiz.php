<span style="display:none;">
    <?php 
        $id = $_GET['id'];
        include "config/dbh.inc.php";
        $sql = "SELECT * FROM quiz INNER JOIN categorys_quiz ON quiz.id_category = categorys_quiz.id_category WHERE quiz.id_category = $id";
        $result_quiz = $conn->query($sql);
        $count_quiz = mysqli_num_rows($result_quiz);
        $data = [];
        while($row_quiz = $result_quiz->fetch_assoc()){
            array_push($data, $row_quiz);
        }
    ?>
</span>
<?php 
    echo "<style>#portfolioId {
        background-image: url(images/includes/".$data[0]['img_category'].");
    }</style>";
?>



<div class="first-widget parallax" id="portfolioId">
    <div class="parallax-overlay">
        <div class="container pageTitle">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <h2 class="page-title animated flipInX"><?=$data[0]['title_category']?></h2>
                </div> <!-- /.col-md-6 -->
                <div class="col-md-6 col-sm-6 text-right">
                    <span class="page-location animated flipInX">Home / Quiz</span>
                </div> <!-- /.col-md-6 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.parallax-overlay -->
</div> <!-- /.pageTitle -->

<div class="container">	
    <form id="form_Quiz">
        <div class="row">
            <div class="col-md-8 blog-posts" id="Quiz_Result" style="display:none;">
                <ul class="list-group">
                    <li class="list-group-item"><h3><b><i class="fa fa-file-text-o" aria-hidden="true"></i> สรุปผล (conclude)</b></h3></li>
                    <li class="list-group-item">- หัวข้อ : <?=$data[0]['title_category']?></li>
                    <li class="list-group-item">- คุณ : <span id="NAME_USER_RESPONSE">NONE</span></li>
                    <li class="list-group-item">- คะแนน : <b><span id="SCORE_USER_RESPONSE">5</span>/<?=$count_quiz?></b></li>
                </ul>
                <ul class="list-group">
                    <li class="list-group-item"><h3><b><i class="fa fa-check-square-o" aria-hidden="true"></i> เฉลย (Answer)</b> <button id="btn_see_answer" type="button" class="btn btn-info pull-right"><i class="fa fa-eye" aria-hidden="true"></i> ดูเฉลยคำตอบ</button></h3></li>
                    <li class="list-group-item" style="display:none;" id="see_answer">
                    <?php 
                        $i = 1;
                        foreach ($data as $key => $value) {
                            ?>
                                <b>Question <?=$i?></b> <br>
                                Q. <?=$value['question_quiz']?> &nbsp;&nbsp;&nbsp;&nbsp; <b>Ans. <?=$value['correct_answer']?> <?php echo htmlspecialchars($value['choice_'.$value['correct_answer']]);?></b> <br><br>
                            <?php
                            $i++;
                        }
                    ?>
                    </li>
                </ul>
                
            </div>
            <div class="col-md-8 blog-posts" id="Quiz_Blog" style="display:none;">
                    <h5><b>Welcome,</b> <span id="Show_Name_User"></span> คำถามมีทั้งหมด <?=$count_quiz?> ข้อ</h5>
                    <?php 
                        $i = 1;
                        foreach ($data as $key => $value) {
                            ?>
                                <div class="col-md-12" style="margin-top:15px;">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 style="margin-left:20px;"><b>Question <?=$i?></b></h5><br>
                                            <p style="margin-left:20px;"><b>Q. <?=$value['question_quiz']?></b></p>
                                            <div class="cntr" style="margin-left:20px;">
                                                <div class="col-md-6">
                                                    <label for="q_<?=$i?>" class="btn-radio">
                                                        <input required value="1" type="radio" name="q_<?=$i?>">
                                                        <span>1. <?=htmlspecialchars($value['choice_1'])?></span>
                                                    </label>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label for="q_<?=$i?>" class="btn-radio">
                                                        <input required type="radio" value="2" name="q_<?=$i?>">
                                                        <span>2. <?=htmlspecialchars($value['choice_2'])?></span>
                                                    </label>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="q_<?=$i?>" class="btn-radio">
                                                        <input required type="radio" value="3" name="q_<?=$i?>">
                                                        <span>3. <?=htmlspecialchars($value['choice_3'])?></span>
                                                    </label>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label for="q_<?=$i?>" class="btn-radio">
                                                            <input required type="radio" value="4" name="q_<?=$i?>">
                                                            <span>4. <?=htmlspecialchars($value['choice_4'])?></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                            $i++;
                        }
                    ?>
                    
                    <input type="hidden" name="id_category" value="<?=$data[0]['id_category']?>">
                    <button style="margin-right:20px;margin-top:17px;padding:10px 80px;" id="btn_Submit" class="btn btn-success btn-lg pull-right"><i class="fa fa-check-circle-o" aria-hidden="true"></i> ส่งคำตอบ</button>
                
            </div>
            <div class="col-md-8 blog-posts" id="Quiz_Name">
                <div class="alert alert-warning" role="alert">
                    <?=$data[0]['title_category']?><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;- มีคำถามทั้งหมด <?=$count_quiz?> ข้อ<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;- เลือกคำตอบที่ถูกต้องที่สุด<br><br>
                    &nbsp;&nbsp;&nbsp;&nbsp; *** กรอกชื่อของคุณก่อนเริ่มทำ
                </div>
                <div class="alert alert-danger Error_Name_Empty" role="alert" style="display:none;" id="Error_Name_Empty">** กรุณากรอกชื่อก่อน</div>
                <div class="form-group">
                    <label for="NAME_USER" style="color:#000 !important;">ENTER YOUR NAME</label>
                    <input type="text" class="form-control" id="NAME_USER" name="NAME_USER" placeholder="NAME">
                    <button type="button" class="btn btn-warning btn-block" id="btn_Quiz_Name" style="margin-top:15px;">SUMBIT</button>
                </div>
            </div>
            <div class="col-md-4">
				<div class="sidebar">
					<div class="sidebar-widget">
						<h5 class="widget-title">Other Quiz!</h5>
						<div class="last-post clearfix">
							<div class="thumb pull-left">
								<a href="#"><img width="80" height="80" src="images/includes/c_img80.jpg" alt=""></a>
							</div>
							<div class="content">
								<span>ภาษา C</span>
								<h4><a href="#">C Quiz</a></h4>
							</div>
						</div> <!-- /.last-post -->
						<div class="last-post clearfix">
							<div class="thumb pull-left">
								<a href="#"><img src="images/includes/html_img80.jpg" alt=""></a>
							</div>
							<div class="content">
								<span>ภาษา HTML</span>
								<h4><a href="#">HTML Quiz</a></h4>
							</div>
						</div> <!-- /.last-post -->
						<div class="last-post clearfix">
							<div class="thumb pull-left">
								<a href="#"><img src="images/includes/comsci_img80.jpg" alt=""></a>
							</div>
							<div class="content">
								<span>วิทยาการคอมเบื้องต้น</span>
								<h4><a href="#">ComSci Quiz</a></h4>
							</div>
						</div> <!-- /.last-post -->
					</div> <!-- /.sidebar-widget -->
				</div> <!-- /.sidebar -->
			</div>
        </div> <!-- /.row -->
    </form>
</div> <!-- /.container -->	