<?php
// $search = '59122660101';
// include "conn.php";
// $sql = "SELECT d.*,a.*,b.id ,t.id AS tracking_id ,c.subject_name 
// FROM student d LEFT JOIN `register` a ON(a.s_group=d.s_group) 
// LEFT JOIN assignment b ON(a.r_id=b.register_id) 
// LEFT JOIN subject c ON(a.subject_id=c.subject_id) 
// LEFT JOIN tracking t ON(t.student_id=d.student_id 
// AND t.assign_id=b.id) WHERE d.student_id='$search'"


?>
<?php
// echo $search ;
// exit;
?>
<section class="section is-title-bar  has-background-success ">
  <div class="level">
    <div class="level-left">
      <div class="level-item">
        <ul>
          <li class="has-text-black">Home</li>
          <li class="has-text-black">Tracking Assignment</li>
        </ul>
      </div>
    </div>
    <div class="level">
      <div class="level-right">
        <div class="level-item">        
        </div>
      </div>
    </div>
</section>
<section class="section  has-background-grey-light" >
<div class="field is-horizontal">
  <div class="field-label is-normal">
    <label class="label">Tracking</label>
  </div>
  <div class="field-body">
    <div class="field">
      <div class="control">
        <input class="input " name="search_text" id="search_text" type="text" placeholder="Student ID">
      </div>
      <br>
     <div>
       <button class="button is-primary">Search</button>
     </div>
    </div>
  </div>
</div>
<div id="result"></div>
		</div>
		<div style="clear:both"></div>
</section>

<script>
$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"dist/fetch_index.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
});
</script>
