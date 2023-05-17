
function Message(){

    var studentId = document.querySelector('input[name="student_id"]');
    var cpr = document.querySelector('input[name="cpr"]');
    var college = document.querySelector('select[name="college"]');
    var major = document.querySelector('select[name="major"]');
    var gender = document.querySelectorAll('input[name="gender"]');
    var email = document.querySelector('input[name="email"]');
    var phone = document.querySelector('input[name="contact_phone"]');
    var address = document.querySelector('input[name="address"]');
    var creditReg = document.querySelector('input[name="credit_reg"]');
    var creditPass = document.querySelector('input[name="credit_pass"]');
   // var gpa = document.querySelector('input[name="gpa"]');
   // var save = document.querySelector('button[name="save"]');
    var cancel = document.querySelector('button[name="cancel"]'); 

        const success =document.getElementById('success');
        const danger =document.getElementById('danger');


        if(studentId.value ===''||cpr.value ===''|| college.value ===''||
        major.value ===''|| gender.value ===''|| email.value ===''|| 
        phone.value ===''|| address.value ===''|| creditReg.value ===''||
        creditPass.value ===''|| gpa.value ==='' )
        {

                danger.style.display='block';

        }
}