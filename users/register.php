
<?php 
include("includes/header.php");
?>
<div class="register-page">
<div class="register-box">
  <div class="register-logo">
    <b>Users Registration</b>
  </div>
    <?php include("message.php");?>
  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="register-code.php" enctype="multipart/form-data" onsubmit="return finalValidate()" method="post">
      <div class="input-group mb-3">
        <div class="form-check">
            <input class="form-check-input" type="radio" value="STUDENT" name="radio1" required>
            <label class="form-check-label" for="radio1">STUDENT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        </div>
        
        <div class="form-check">
            <input class="form-check-input" type="radio" value="FACULTY" name="radio1" required>
            <label class="form-check-label" for="radio1">FACULTY</label>
        </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="txt_name" name="name" placeholder="Full name" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <input type="text" class="form-control" id="txt_regid" name = "RegID" placeholder="Registration ID" required>
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user"></span>
            </div>
        </div>
    </div>
    <label id="lbl_regerror" style="color:red"></label>
        
        <div class="input-group mb-3">
            <input type="email" class="form-control" id="txt_email" onclick="vp3()" name = "email" placeholder="Email" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>
        <label id="lbl_emailerror" style="color:red"></label>
        <div class="input-group mb-3">
            <input type="password" class="form-control" onclick="validateEmail()" id="txt_password" name = "pass"  placeholder="Password" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <label id="lbl_passerror" style="color:red"></label>
        <div class="input-group mb-3">
            <input type="password" class="form-control" id="txt_cpassword" name = "conpass"  onclick="vp()" placeholder="Retype password" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <label id="lbl_passerror" style="color:red"></label>
        <div class="form-group">
            <div class="input-group">
                <div class="custom-file">
                    <input
                    type="file"
                    class="custom-file-input"
                    id="exampleInputFile"
                    placeholder="Upload Profile"
                    name="profile"
                    onclick="vp2()"
                    accept="image/png, image/git, image/jpeg" required
                    />
                    <label
                    class="custom-file-label"
                    for="exampleInputFile"
                    >Upload ID-CARD</label
                    >
                </div>
            </div>
        </div>
        <label id="lbl_cpasserror" style="color:red"></label>
                      
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              
            </div>
          </div>

          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name= "register-btn"class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <a href="login.php" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
</div>





<script>

let Result1 = false;
let Result2 = false;
let Result3 = false;
let Result4 = false;
let Result5 = false;
const Result6 = false;




function vp3(){
    const reg = document.getElementById('txt_regid').value;
    console.log(reg);
    // const domain = "@sggs.ac.in";
    // const currentDate = new Date();
    // const currentYear = currentDate.getFullYear();
    // const year = currentYear-24;
    // console.log(year);
    
    let year = [2000];
    for(let i=2001;i<2090;i++){
        year.push(i);
    }
    
    
    const branches = ["bit","bch","bme","bec","bcs"];
    let count1 = 0;
    let count2 = 0;
    let count3 = 0;
    // let count4 = 0;
    
    for(const element of year){
        if(reg.includes(element)){
            count1 += 1;
        }
    }
    
    
    
    for (const element of branches) {
        if(reg.includes(element)){
            count2 += 1;
        }
    }
    
    // if(email.includes(domain)){
        //     count4 += 1;
        // }
        
        
        console.log(reg.length);
        
        if(reg.length == 10){
            count3 += 1;
        }
        
        
        console.log(count1);
        console.log(count2);
        console.log(count3);

        if(count1 == 0 || count2 == 0 || count3 == 0)
        {
            document.getElementById('lbl_regerror').innerHTML = "Incorrect Registration No.";
            return false;
        } else {
            console.log("else");
            document.getElementById('lbl_regerror').innerHTML = "";
            Result1 = true;
            return true;
        }
        
    }
    
    
    
    
    
    
    function vp2(){
        let cpass = document.getElementById('txt_cpassword').value;
        let pass = document.getElementById('txt_password').value;
        
        console.log("pass = "+pass);
        console.log("cpass = "+cpass);
        
        console.log(cpass == pass);
        if(cpass != pass){
            document.getElementById('lbl_cpasserror').innerHTML = "Password Doesn't match! ";
        } else {
            document.getElementById('lbl_cpasserror').innerHTML = "";
            Result2 = true;
        }
        
    }
    
    
    
    
    function vp(){
        let pass = document.getElementById('txt_password').value.length;
        console.log(pass);
        // const cpass = document.getElementById('txt_cpassword');
        // console.log(pass == cpass);
    if(pass >= 8){
        console.log("VALID!"); 
        document.getElementById('lbl_passerror').innerHTML = "";
        Result3 = true;
    } else {
        document.getElementById('lbl_passerror').innerHTML = "Password must be greater than 8 characters!";
    }
}




function validateEmail(){
    console.log("Changed!");
    const email = document.getElementById('txt_email').value;
    const domain = "@sggs.ac.in";
    // const currentDate = new Date();
    // const currentYear = currentDate.getFullYear();
    // const year = currentYear;
    
    let year = [2000];
    for(let i=2001;i<2090;i++){
        year.push(i);
    }
    
    
    const branches = ["bit","bch","bme","bec","bcs"];
    let count1 = 0;
    let count2 = 0;
    let count3 = 0;
    let count4 = 0;
    
    for(const element of year){
        if(email.includes(element)){
            count1 += 1;
        }
    }
    
    
    
    for (const element of branches) {
        if(email.includes(element)){
            count2 += 1;
        }
    }
    
    if(email.includes(domain)){
        count4 += 1;
    }
    
    
    console.log(email.length);
    
    if(email.length == 21){
        count3 += 1;
    }
    
    
    
    
    if(count1 == 0 || count2 == 0 || count3 == 0 || count4 == 0)
    {
        document.getElementById('lbl_emailerror').innerHTML = "Incorrect Email";
        return false;
    } else {
        document.getElementById('lbl_emailerror').innerHTML = "";
        Result4 = true;
        return true;
    }
    
}



function finalValidate(){

    console.log("RESULT1 = "+Result1);
    console.log("RESULT2 = "+Result2);
    console.log("RESULT3 = "+Result3);
    console.log("RESULT4 = "+Result4);
    // console.log("RESULT1 = "+Result1);

    if(Result1 == true && Result2 == true && Result3 == true && Result == true){
        console.log("TRUE");
        return true;
    } else {
        console.log("FALSE");
        return false;
    }
}


// function validate_email_for_student() {
    
    
    // console.log("clickeD!");
    
    // const email = document.getElementById('txt_email').value;
    // let result = true;
    // const domain = "@sggs.ac.in";
    // const currentDate = new Date();
    // const currentYear = currentDate.getFullYear();
    // const year = currentYear;
    
    // const branches = ["bit","bch","bme","bec","bcs"];
    // let count1 = 0;
    // let count2 = 0;
    // let count3 = 0;
    // let count4 = 0;
    
    
    // if(email.includes(year)){
        //     count1 += 1;
// }



// for (const element of branches) {
// if(email.includes(element)){
//     count2 += 1;
// }
// }

// if(email.includes(domain)){
//     count4 += 1;
// }


// console.log(email.length);

// if(email.length == 21){
// count3 += 1;
// }




// if(count1 == 0 || count2 == 0 || count3 == 0 || count4 == 0)
// {
//     document.getElementById('lbl_emailerror').innerHTML = "Incorrect Email";
// return false;
// } else {
// return true;
// }



// }


// // function validate_RegId(){
// //     const regid = document.getElementById('txt_regid');
// //     let result = true;
// // const currentDate = new Date();
// // const currentYear = currentDate.getFullYear();
// // const year = currentYear;

// // const branches = ["bit","bch","bme","bec","bcs"];
// // let count1 = 0;
// // let count2 = 0;
// // let count3 = 0;

// // if(regid.includes(year)){
// //     count1 += 1;
// // }


// // for (const element of branches) {
// // if(regid.includes(element)){
// //     count2 += 1;
// // }
// // }

// // console.log(email.length);

// // if(regid.length == 10){
// // count3 += 1;
// // }

// //     if(count1 == 0 || count2 == 0 || count3 == 0)
// //     {
// //         return false;   
// //     } else {
// //         return true;
// //     }

// // }


// function validate_password(){

//     const password = document.getElementById('txt_password').value;
//     if (password.length >= 8) {
//         return true;
//     } else {
//         return false;
//     }

// }



// function validate(){
//     return false;
// // return validate_email_for_student();
// // console.log("validate_email_for_student() = "+validate_email_for_student());
// // console.log("validate_password() = "+validate_password());
// // // console.log("validate_RegId() = "+validate_RegId());
// // // event.preventDefault();
// // if(validate_email_for_student()){
// //    if(validate_password()){
        
// //     const pass = document.getElementById('txt_password').value;
// //     const cpass = document.getElementById('txt_cpassword').value;
// //     console.log(pass == cpass);
// //     if(pass == cpass){
// //             console.log(email.includes(document.getElementById('txt_regid').value);
// //             if(email.includes(document.getElementById('txt_regid').value)){
                
// //                 const regid = document.getElementById('regid').value;
// //                 console.log(regid);
// //                 const email = document.getElementById('txt_email').value;
// //                 if(email.includes(regid)){
// //                     return true;
// //                     event.preventDefault();
// //                 } else {
// //                     document.getElementById('lbl_error').innerHTML = "Incorrect Registration ID";
// //                     return false;
// //                 }
                
// //             } else {
// //                 document.getElementById('lbl_error').innerHTML = "Incorrect Registration ID";
// //                 return false;
// //             }
// //         } else {
// //             document.getElementById('lbl_error').innerHTML = "Password Doesn't Match";
// //             return false;
// //         }
// //    } else {
// //     document.getElementById('lbl_error').innerHTML = "Incorrect Password!";
// //     return false;
// //    }
// // } else {
// //     document.getElementById('lbl_error').innerHTML = "Incorrect Email!";
// //     return false;
// // }
// }




    
</script>
























<?php
include('includes/footer.php');
?>