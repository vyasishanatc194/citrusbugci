<script type="text/javascript" src="<?php echo $this->config->item('webappassets');?>js/fancybox/jquery.fancybox-1.3.4.pack.js?v=6-20-13"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('webappassets');?>js/fancybox/jquery.fancybox-1.3.4.css?v=6-20-13" media="screen" />
<script type="text/javascript" src="<?php echo $this->config->item('webappassets');?>js/fancybox/jquery.mousewheel-3.0.4.pack.js?v=6-20-13"></script>
<script type="text/javascript" src="<?php echo $this->config->item('webappassets');?>js/jquery.blockUI.js?v=6-20-13"></script>
<script type="text/javascript">
    $(document).ready(function(){
    $(".fancybox").fancybox({'autoDimensions':false,'centerOnScroll':true,'scrolling':true,'width':'400','height':'auto'});

    <?php if('1'==$extra['contact_import_progress']){?>
      $('.subscriber_msg').show();
      setInterval('checkImportStatus()',10000);
    <?php }else{?>
 
    <?php }?>
    });
  $(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
</script>
<script type="text/javascript" src="<?php echo $this->config->item('webappassets'); ?>js/jquery.fastconfirm.js?v=6-20-13"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('webappassets'); ?>css/jquery.fastconfirm.css?v=6-20-13" media="screen" />
<script type="text/javascript" src="<?php echo $this->config->item('webappassets'); ?>js/ajaxfileupload.js?v=6-20-13"></script>
<script type="text/javascript">
var base_url="<?php echo base_url();?>";
var webappassets="<?php echo $this->config->item('webappassets');?>";
var memid="<?php echo $extra['member_id'];?>";
</script>
<script type="text/javascript" src="<?php echo $this->config->item('webappassets'); ?>js/contacts_add_admin.js?v=6-20-13"></script>
<!--[body]-->
  <div id="body-dashborad">
    <div class="container">
      
      <div class="form-fields">
        <div class="import_contact subscriber_menus">
          <div class="subscriber_msg_remove" style="display:block;"></div>
          <?php echo form_open_multipart('newsletter/subscriber/create/', array('id' => 'form_subscriber_import','name'=>'form_subscriber_import','class'=>"form-website")); ?>
            <div class="file-upload">
              <strong>Upload file with extension CSV or XLS:</strong>
              <?php echo form_upload(array('id'=>'subscriber_csv_file','name'=>'subscriber_csv_file','value'=>set_value('subscriber_csv_file') )); ?>
            </div>
            <div class="add-contacts-actions">
              <strong>Select List:</strong><br />
              <select name="subscription_select" id="subscription_select">
              <?php
               foreach($select_subscriptions as $subscription){
                if($subscription_first_id == $subscription['subscription_id'])
                  echo "<option value='".$subscription['subscription_id']."' selected>".ucfirst($subscription['subscription_title'])."</option>";
                else
                  echo "<option value='".$subscription['subscription_id']."'>".ucfirst($subscription['subscription_title'])."</option>";
              }
              ?>
              </select>
            
			<br/>
			<br/>
              <?php
                echo form_button(array('name'=>'subscriber_submit','id'=>'subscriber_submit','class'=>'btn confirm','value'=>'Import','content'=>'Save','onclick'=>"return ajaxFileUpload();"));                
              ?>
            </div>
          </form>
        </div>
        
      </div>
    </div>
  </div>
