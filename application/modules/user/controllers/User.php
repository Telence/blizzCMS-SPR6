<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * BlizzCMS
 *
 * An Open Source CMS for "World of Warcraft"
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2017 - 2019, WoW-CMS
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @author  WoW-CMS
 * @copyright  Copyright (c) 2017 - 2019, WoW-CMS.
 * @license https://opensource.org/licenses/MIT MIT License
 * @link    https://wow-cms.com
 * @since   Version 1.0.1
 * @filesource
 */

class User extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');

        if (!ini_get('date.timezone'))
           date_default_timezone_set($this->config->item('timezone'));
    }

    public function login()
    {
        if (!$this->wowmodule->getLoginStatus())
            redirect(base_url(),'refresh');

        if ($this->wowauth->isLogged())
            redirect(base_url(),'refresh');

        $data = array(
            'pagetitle' => $this->lang->line('tab_login'),
            'recapKey' => $this->config->item('recaptcha_sitekey'),
            'lang' => $this->lang->lang(),
        );
            
        if ($this->input->method() == 'post')
        {
			$this->form_validation->set_rules('username', 'Username/Email', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

            
            if ($this->form_validation->run() == FALSE)
			{
                redirect(base_url('register'), 'refresh');
			}
            else
            {
                $response = $this->user_model->authentication(
					$this->input->post('username', TRUE),
					$this->input->post('password')
				);

				if (! $response)
				{
					$this->session->set_flashdata('error', lang('login_error'));
                    $this->template->build('login', $data);
				}
				else
				{
					redirect(site_url('panel'));
				}

            }
        } 
        else 
        {
            $this->template->build('login', $data);
        }
       
    }

    public function register()
    {
        if (!$this->wowgeneral->getMaintenance())
        redirect(base_url('maintenance'),'refresh');

        if (!$this->wowmodule->getRegisterStatus())
            redirect(base_url(),'refresh');

        if ($this->wowauth->isLogged())
            redirect(base_url(), 'refresh');


        if ($this->input->method() == 'post')
        {
			$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[3]|max_length[16]|differs[nickname]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('confirm_password', 'Confirm password', 'trim|required|min_length[8]|matches[password]');

            if ($this->form_validation->run() == FALSE)
			{
                redirect(base_url('register'), 'refresh');
			}
            else
            {
				$username   = $this->input->post('username', TRUE);
				$email      = $this->input->post('email', TRUE);
				$password   = $this->input->post('password');

                $emulator = $this->config->item('emulator');


                if ( ! $this->wowauth->account_unique($username, 'username'))
                {
					redirect(site_url('register'));
                }

                if ( ! $this->wowauth->account_unique($email, 'email'))
                {
					redirect(site_url('register'));
                }

                

                $register = $this->user_model->insertRegister($username, $email, $password, $emulator);

                if ($register)
                {
                    $this->session->set_flashdata('success', lang('register_success'));
					redirect(site_url('login'));
                }
                else
                {
					redirect(site_url('register'));
                }
                
            }
        }
        else
        {
            $data = array(
                'pagetitle' => $this->lang->line('tab_register'),
                'recapKey' => $this->config->item('recaptcha_sitekey'),
                'lang' => $this->lang->lang(),
            );
    
            $this->template->build('register', $data);
        }
    }

    public function logout()
    {
        $this->wowauth->logout();
    }

    public function recovery()
    {
        if (!$this->wowgeneral->getMaintenance())
            redirect(base_url('maintenance'),'refresh');

        if (!$this->wowmodule->getRecoveryStatus())
            redirect(base_url(),'refresh');

        if ($this->wowauth->isLogged())
            redirect(base_url(),'refresh');

        $data = array(
            'pagetitle' => $this->lang->line('tab_reset'),
            'recapKey' => $this->config->item('recaptcha_sitekey'),
            'lang' => $this->lang->lang(),
        );

        $this->template->build('recovery', $data);
    }

    public function forgotpassword()
    {
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        echo $this->user_model->sendpassword($username, $email);
    }

    public function activate($key)
    {
        echo $this->user_model->activateAccount($key);
    }

    public function panel()
    {
        if (!$this->wowgeneral->getMaintenance())
            redirect(base_url(),'refresh');

        if (!$this->wowmodule->getUCPStatus())
            redirect(base_url(),'refresh');

        if (!$this->wowauth->isLogged())
            redirect(base_url(),'refresh');

        $data = array(
            'pagetitle' => $this->lang->line('tab_account'),
            'lang' => $this->lang->lang(),
        );

        $this->template->build('panel', $data);
    }

    public function settings()
    {
        if (!$this->wowgeneral->getMaintenance())
            redirect(base_url(),'refresh');

        if (!$this->wowmodule->getUCPStatus())
            redirect(base_url(),'refresh');

        if (!$this->wowauth->isLogged())
            redirect(base_url(),'refresh');

        $data = array(
            'pagetitle' => $this->lang->line('tab_account'),
            'lang' => $this->lang->lang(),
        );

        $this->template->build('settings', $data);
    }

    public function newusername()
    {
        if (!$this->wowgeneral->getMaintenance())
            redirect(base_url('maintenance'),'refresh');

        if ($this->input->method() == 'post') {

			$this->form_validation->set_rules('newusername', 'New username', 'trim|required');
            $this->form_validation->set_rules('confirmusername', 'Confirm Username', 'trim|required|matches[newusername]');

            if ($this->form_validation->run() == FALSE)
			{
                redirect(base_url('settings'), 'refresh');
			}
            else
            {
                $username   = $this->wowauth->getSiteUsernameID($this->session->userdata('wow_sess_id'));
				$newusername = $this->input->post('newusername', TRUE);
				$password   = $this->input->post('password');

                $change = $this->user_model->changeUsername($username, $newusername, $password);

                if ($change)
					redirect(site_url('logout'), 'refresh');
                else
					redirect(site_url('settings'), 'refresh');
            }
        }
        else
        {
            redirect(base_url(), 'refresh');
        }
    }

    public function newpass()
    {
        $oldpass = $this->input->post('oldpass');
        $newpass = $this->input->post('newpass');
        $renewpass = $this->input->post('renewpass');
        echo $this->user_model->changePassword($oldpass, $newpass, $renewpass);
    }

    public function newemail()
    {
        if (!$this->wowgeneral->getMaintenance())
        redirect(base_url('maintenance'),'refresh');

        if ($this->input->method() == 'post') {

            $this->form_validation->set_rules('change_newemail', 'New email', 'trim|required');
            $this->form_validation->set_rules('change_renewemail', 'Confirm email', 'trim|required|matches[change_newemail]');
            $this->form_validation->set_rules('change_password', 'Password',  'trim|required');

            if ($this->form_validation->run() == FALSE)
            {
                redirect(base_url('settings'), 'refresh');
            }
            else
            {
                $email = $this->wowauth->getEmailID($this->session->userdata('wow_sess_id'));
                $newemail = $this->input->post('change_newemail', TRUE);
                $password   = $this->input->post('change_password');

                $change = $this->user_model->changeEmail($email, $newemail, $password);

                if ($change)
                    redirect(site_url('logout'), 'refresh');
                else
                    redirect(site_url('settings'), 'refresh');
            }
        }
        else
        {
            redirect(base_url(), 'refresh');
        }
    }

    public function newavatar()
    {
        $avatar = $this->input->post('avatar');
        echo $this->user_model->changeAvatar($avatar);
    }
}
