
    <section  class="section is-title-bar has-background-success" >
      <div class="level">
        <div class="level-left">
          <div class="level-item">
            <ul>
                <?php 
                   $headers = explode("/",$pageid->headers);
                   foreach($headers AS $h){
                ?>
              <li class="has-text-black"><?php echo $h;?></li>
                   <?php } ?>
            </ul>
          </div>         
        </div>
        <div class="level">
             <div class="level-right">
               <div class="level-item">
                    <?php if(@$pageid->cases === "assignment" ){ ?>
                      <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#assignModal">มอบหมายงาน</button>
                    <?php } ?>
               </div>
             </div>
        </div>
      </div>
    </section>