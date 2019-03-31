    <section class="uk-section uk-section-xsmall uk-padding-remove slider-section">
      <div class="uk-background-cover uk-height-small header-section"></div>
    </section>
    <section class="uk-section uk-section-xsmall main-section" data-uk-height-viewport="expand: true">
      <div class="uk-container">
        <div class="uk-grid uk-grid-medium" data-uk-grid>
          <div class="uk-width-1-4@m">
            <ul class="uk-nav uk-nav-default myaccount-nav">
              <?php if($this->m_modules->getUCPStatus() == '1'): ?>
              <li><a href="<?= base_url('panel'); ?>"><i class="fas fa-user-circle"></i> <?= $this->lang->line('tab_account'); ?></a></li>
              <?php endif; ?>
              <li class="uk-nav-divider"></li>
              <?php if($this->m_modules->getDonationStatus() == '1'): ?>
              <li><a href="<?= base_url('donate'); ?>"><i class="fas fa-hand-holding-usd"></i> <?=$this->lang->line('navbar_donate_panel'); ?></a></li>
              <?php endif; ?>
              <?php if($this->m_modules->getVoteStatus() == '1'): ?>
              <li><a href="<?= base_url('vote'); ?>"><i class="fas fa-vote-yea"></i> <?=$this->lang->line('navbar_vote_panel'); ?></a></li>
              <?php endif; ?>
              <?php if($this->m_modules->getStoreStatus() == '1'): ?>
              <li><a href="<?= base_url('store'); ?>"><i class="fas fa-store"></i> <?=$this->lang->line('tab_store'); ?></a></li>
              <?php endif; ?>
              <li class="uk-nav-divider"></li>
              <?php if($this->m_modules->getBugtrackerStatus() == '1'): ?>
              <li><a href="<?= base_url('bugtracker'); ?>"><i class="fas fa-bug"></i> <?=$this->lang->line('tab_bugtracker'); ?></a></li>
              <?php endif; ?>
              <?php if($this->m_modules->getChangelogsStatus() == '1'): ?>
              <li><a href="<?= base_url('changelogs'); ?>"><i class="fas fa-scroll"></i> <?=$this->lang->line('tab_changelogs'); ?></a></li>
              <?php endif; ?>
            </ul>
          </div>
          <div class="uk-width-3-4@m">
            <h3 class="uk-h3 uk-text-uppercase uk-text-bold"><?= $this->lang->line('button_account_settings'); ?></h3>
            <div class="uk-card-default myaccount-card uk-margin-small">
              <div class="uk-card-body">
                <div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid>
                  <div class="uk-width-1-2@s">
                    <h5 class="uk-h5 uk-text-uppercase uk-text-bold"><i class="fas fa-envelope"></i> <?= $this->lang->line('panel_change_email'); ?></h5>
                    <?= form_open('', 'id="changeemailForm" onsubmit="ChangeEmailForm(event)"'); ?>
                    <div class="uk-margin uk-light">
                      <label class="uk-form-label"><?= $this->lang->line('panel_current_email'); ?>:</label>
                      <div class="uk-form-controls">
                        <div class="uk-inline uk-width-1-1">
                          <span class="uk-form-icon"><i class="fas fa-envelope fa-lg"></i></span>
                          <input class="uk-input uk-disabled" type="email" placeholder="<?= $this->m_data->getEmailID($this->session->userdata('fx_sess_id')); ?>" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="uk-margin uk-light">
                      <label class="uk-form-label"><?= $this->lang->line('panel_replace_email_by'); ?>:</label>
                      <div class="uk-form-controls">
                        <div class="uk-inline uk-width-1-1">
                          <span class="uk-form-icon"><i class="far fa-envelope fa-lg"></i></span>
                          <input class="uk-input" id="change_newemail" type="email" placeholder="<?= $this->lang->line('placeholder_new_email'); ?>" required>
                        </div>
                      </div>
                    </div>
                    <div class="uk-margin uk-light">
                      <div class="uk-form-controls">
                        <div class="uk-inline uk-width-1-1">
                          <span class="uk-form-icon"><i class="far fa-envelope fa-lg"></i></span>
                          <input class="uk-input" id="change_renewemail" type="email" placeholder="<?= $this->lang->line('placeholder_confirm_email'); ?>" required>
                        </div>
                      </div>
                    </div>
                    <div class="uk-margin uk-light">
                      <div class="uk-form-controls">
                        <div class="uk-inline uk-width-1-1">
                          <span class="uk-form-icon"><i class="fas fa-key fa-lg"></i></span>
                          <input class="uk-input" id="change_password" type="password" pattern=".{5,16}" placeholder="<?= $this->lang->line('placeholder_password'); ?>" required>
                        </div>
                      </div>
                    </div>
                    <div class="uk-margin">
                      <button class="uk-button uk-button-default uk-width-1-1"><i class="fas fa-sync"></i> <?= $this->lang->line('button_save_changes'); ?></button>
                    </div>
                    <?= form_close(); ?>
                  </div>
                  <div class="uk-width-1-2@s">
                    <h5 class="uk-h5 uk-text-uppercase uk-text-bold"><i class="fas fa-envelope"></i> <?= $this->lang->line('panel_change_password'); ?></h5>
                    <?= form_open('', 'id="changepasswordForm" onsubmit="ChangePasswordForm(event)"'); ?>
                    <div class="uk-margin uk-light">
                      <label class="uk-form-label"><?= $this->lang->line('placeholder_current_password'); ?>:</label>
                      <div class="uk-form-controls">
                        <div class="uk-inline uk-width-1-1">
                          <span class="uk-form-icon"><i class="fas fa-key fa-lg"></i></span>
                          <input class="uk-input" id="change_oldpass" type="password" pattern=".{5,16}" placeholder="<?= $this->lang->line('placeholder_current_password'); ?>" required>
                        </div>
                      </div>
                    </div>
                    <div class="uk-margin uk-light">
                      <label class="uk-form-label"><?= $this->lang->line('panel_replace_pass_by'); ?></label>
                      <div class="uk-form-controls">
                        <div class="uk-inline uk-width-1-1">
                          <span class="uk-form-icon"><i class="fas fa-unlock fa-lg"></i></span>
                          <input class="uk-input" id="change_newpass" type="password" pattern=".{5,16}" placeholder="<?= $this->lang->line('placeholder_new_password'); ?>" required>
                        </div>
                      </div>
                    </div>
                    <div class="uk-margin uk-light">
                      <div class="uk-form-controls">
                        <div class="uk-inline uk-width-1-1">
                          <span class="uk-form-icon"><i class="fas fa-lock fa-lg"></i></span>
                          <input class="uk-input" id="change_renewpass" type="password" pattern=".{5,16}" placeholder="<?= $this->lang->line('placeholder_re_password'); ?>" required>
                        </div>
                      </div>
                    </div>
                    <div class="uk-margin">
                      <button class="uk-button uk-button-default uk-width-1-1"><i class="fas fa-sync"></i> <?= $this->lang->line('button_save_changes'); ?></button>
                    </div>
                    <?= form_close(); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script>
      function ChangeEmailForm(e) {
        e.preventDefault();

        var newemail = $('#change_newemail').val();
        var renewemail = $('#change_renewemail').val();
        var password = $('#change_password').val();
        if(newemail == '' || renewemail == ''){
          $.amaran({
            'theme': 'awesome error',
            'content': {
              title: '<?= $this->lang->line('notification_title_error'); ?>',
              message: '<?= $this->lang->line('notification_email_empty'); ?>',
              info: '',
              icon: 'fas fa-times-circle'
            },
            'delay': 5000,
            'position': 'top right',
            'inEffect': 'slideRight',
            'outEffect': 'slideRight'
          });
          return false;
        }

        if(password == ''){
          $.amaran({
            'theme': 'awesome error',
            'content': {
              title: '<?= $this->lang->line('notification_title_error'); ?>',
              message: '<?= $this->lang->line('notification_password_empty'); ?>',
              info: '',
              icon: 'fas fa-times-circle'
            },
            'delay': 5000,
            'position': 'top right',
            'inEffect': 'slideRight',
            'outEffect': 'slideRight'
          });
          return false;
        }

        $.ajax({
          url:"<?= base_url($lang.'/changemail'); ?>",
          method:"POST",
          data:{newemail, renewemail, password},
          dataType:"text",
          beforeSend: function(){
            $.amaran({
              'theme': 'awesome info',
              'content': {
                title: '<?= $this->lang->line('notification_title_info'); ?>',
                message: '<?= $this->lang->line('notification_checking'); ?>',
                info: '',
                icon: 'fas fa-sign-in-alt'
              },
              'delay': 5000,
              'position': 'top right',
              'inEffect': 'slideRight',
              'outEffect': 'slideRight'
            });
          },
          success:function(response){
            if(!response)
              alert(response);

            if (response == 'expaError') {
              $.amaran({
                'theme': 'awesome error',
                'content': {
                  title: '<?= $this->lang->line('notification_title_error'); ?>',
                  message: '<?= $this->lang->line('expansion_notfound'); ?>',
                  info: '',
                  icon: 'fas fa-times-circle'
                },
                'delay': 5000,
                'position': 'top right',
                'inEffect': 'slideRight',
                'outEffect': 'slideRight'
              });
              $('#changeemailForm')[0].reset();
              return false;
            }

            if (response == 'epassnotMatch') {
              $.amaran({
                'theme': 'awesome error',
                'content': {
                  title: '<?= $this->lang->line('notification_title_error'); ?>',
                  message: '<?= $this->lang->line('notification_currentpass_not_match'); ?>',
                  info: '',
                  icon: 'fas fa-times-circle'
                },
                'delay': 5000,
                'position': 'top right',
                'inEffect': 'slideRight',
                'outEffect': 'slideRight'
              });
              $('#changeemailForm')[0].reset();
              return false;
            }

            if (response == 'enoMatch') {
              $.amaran({
                'theme': 'awesome error',
                'content': {
                  title: '<?= $this->lang->line('notification_title_error'); ?>',
                  message: '<?= $this->lang->line('notification_email_not_match'); ?>',
                  info: '',
                  icon: 'fas fa-times-circle'
                },
                'delay': 5000,
                'position': 'top right',
                'inEffect': 'slideRight',
                'outEffect': 'slideRight'
              });
              $('#changeemailForm')[0].reset();
              return false;
            }

            if (response == 'usedEmail') {
              $.amaran({
                'theme': 'awesome error',
                'content': {
                  title: '<?= $this->lang->line('notification_title_error'); ?>',
                  message: '<?= $this->lang->line('notification_used_email'); ?>',
                  info: '',
                  icon: 'fas fa-times-circle'
                },
                'delay': 5000,
                'position': 'top right',
                'inEffect': 'slideRight',
                'outEffect': 'slideRight'
              });
              $('#changeemailForm')[0].reset();
              return false;
            }

            if (response) {
              $.amaran({
                'theme': 'awesome ok',
                  'content': {
                  title: '<?= $this->lang->line('notification_title_success'); ?>',
                  message: '<?= $this->lang->line('notification_redirection'); ?>',
                  info: '',
                  icon: 'fas fa-check-circle'
                },
                'delay': 5000,
                'position': 'top right',
                'inEffect': 'slideRight',
                'outEffect': 'slideRight'
              });
            }
            $('#changeemailForm')[0].reset();
            window.location.replace("<?= base_url('logout'); ?>");
          }
        });
      }

      function ChangePasswordForm(e) {
        e.preventDefault();

        var oldpass = $('#change_oldpass').val();
        var newpass = $('#change_newpass').val();
        var renewpass = $('#change_renewpass').val();
        if(oldpass == '' || newpass == '' || renewpass == ''){
          $.amaran({
            'theme': 'awesome error',
            'content': {
              title: '<?= $this->lang->line('notification_title_error'); ?>',
              message: '<?= $this->lang->line('notification_password_empty'); ?>',
              info: '',
              icon: 'fas fa-times-circle'
            },
            'delay': 5000,
            'position': 'top right',
            'inEffect': 'slideRight',
            'outEffect': 'slideRight'
          });
          return false;
        }
        $.ajax({
          url:"<?= base_url($lang.'/changepass'); ?>",
          method:"POST",
          data:{oldpass, newpass, renewpass},
          dataType:"text",
          beforeSend: function(){
            $.amaran({
              'theme': 'awesome info',
              'content': {
                title: '<?= $this->lang->line('notification_title_info'); ?>',
                message: '<?= $this->lang->line('notification_checking'); ?>',
                info: '',
                icon: 'fas fa-sign-in-alt'
              },
              'delay': 5000,
              'position': 'top right',
              'inEffect': 'slideRight',
              'outEffect': 'slideRight'
            });
          },
          success:function(response){
            if(!response)
              alert(response);

            if (response == 'expError') {
              $.amaran({
                'theme': 'awesome error',
                'content': {
                  title: '<?= $this->lang->line('notification_title_error'); ?>',
                  message: '<?= $this->lang->line('expansion_notfound'); ?>',
                  info: '',
                  icon: 'fas fa-times-circle'
                },
                'delay': 5000,
                'position': 'top right',
                'inEffect': 'slideRight',
                'outEffect': 'slideRight'
              });
              $('#changepasswordForm')[0].reset();
              return false;
            }

            if (response == 'passnotMatch') {
              $.amaran({
                'theme': 'awesome error',
                'content': {
                  title: '<?= $this->lang->line('notification_title_error'); ?>',
                  message: '<?= $this->lang->line('notification_currentpass_not_match'); ?>',
                  info: '',
                  icon: 'fas fa-times-circle'
                },
                'delay': 5000,
                'position': 'top right',
                'inEffect': 'slideRight',
                'outEffect': 'slideRight'
              });
              $('#changepasswordForm')[0].reset();
              return false;
            }

            if (response == 'lengError') {
              $.amaran({
                'theme': 'awesome error',
                'content': {
                  title: '<?= $this->lang->line('notification_title_error'); ?>',
                  message: '<?= $this->lang->line('notification_password_lenght_error'); ?>',
                  info: '',
                  icon: 'fas fa-times-circle'
                },
                'delay': 5000,
                'position': 'top right',
                'inEffect': 'slideRight',
                'outEffect': 'slideRight'
              });
              $('#changepasswordForm')[0].reset();
              return false;
            }

            if (response == 'samePass') {
              $.amaran({
                'theme': 'awesome error',
                'content': {
                  title: '<?= $this->lang->line('notification_title_error'); ?>',
                  message: '<?= $this->lang->line('notification_same_password'); ?>',
                  info: '',
                  icon: 'fas fa-times-circle'
                },
                'delay': 5000,
                'position': 'top right',
                'inEffect': 'slideRight',
                'outEffect': 'slideRight'
              });
              $('#changepasswordForm')[0].reset();
              return false;
            }

            if (response == 'noMatch') {
              $.amaran({
                'theme': 'awesome error',
                'content': {
                  title: '<?= $this->lang->line('notification_title_error'); ?>',
                  message: '<?= $this->lang->line('notification_password_not_match'); ?>',
                  info: '',
                  icon: 'fas fa-times-circle'
                },
                'delay': 5000,
                'position': 'top right',
                'inEffect': 'slideRight',
                'outEffect': 'slideRight'
              });
              $('#changepasswordForm')[0].reset();
              return false;
            }

            if (response) {
              $.amaran({
                'theme': 'awesome ok',
                  'content': {
                  title: '<?= $this->lang->line('notification_title_success'); ?>',
                  message: '<?= $this->lang->line('notification_redirection'); ?>',
                  info: '',
                  icon: 'fas fa-check-circle'
                },
                'delay': 5000,
                'position': 'top right',
                'inEffect': 'slideRight',
                'outEffect': 'slideRight'
              });
            }
            $('#changepasswordForm')[0].reset();
            window.location.replace("<?= base_url('logout'); ?>");
          }
        });
      }
    </script>
