<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php $this->load->view('header'); ?>

<style>
    .background{
        width: 100%;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .register_card{
        width: 70%;
        height: 70%;
        box-shadow: 0 0 10px gray;
    }

</style>

<div class="background">
    <div class="register_card">
        <div class="row">
            <h2>Register here</h2>
        </div>
        <div className='RegisterForm'>
            <div className='form Register_form'>
              <div>
                <label htmlFor="name">Full Name :</label>
                <input type="text" id="name" name="name"  onChange={}/>
              </div>
              <div>
                <label htmlFor="email">Email :</label>
                <input type="text" id="email" name="email" onChange={}/>
              </div>
              <div>
                <label htmlFor="phone">Phone Number :</label>
                <input type="number" id="phone" name="phone" onChange={}/>
              </div>
              <div>
                <label htmlFor="nic">NIC :</label>
                <input type="text" id="nic" name="nic" onChange={}/>
              </div>
              <div>
                <label htmlFor="age">Date of Birth :</label>
                <input type="text" id="dob" name="dob" onChange={}/>
              </div>
              <div>
                <label htmlFor="userProPic">Upload Profile Picture :</label>
                <input type="file" id="userProPic" name="userProPic" onChange={}/>
              </div>
              <div>
                <label htmlFor="password">Password :</label>
                <input type="text" id="password" name="password" onChange={}/>
              </div>
              <div>
                <label htmlFor="password">Confirm Password :</label>
                <input type="text" id="password" name="password" onChange={}/>
              </div>
              <div className='RegisterButton'>
                <button type="submit">Create</button>
              </div>
            </div>
          </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php $this->load->view('footer'); ?>
