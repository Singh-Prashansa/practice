function validateForm() {

    var email = document.register_form.email.value;
    var password = document.register_form.password.value;
    var c_password = document.register_form.c_password.value;
    var dob = document.register_form.dob.value;
    var country = document.getElementById('country').value;
    var gender = document.getElementsByName('gender').value;

    // password validation
    if (password != c_password) {
        alert("Password and Confirm Password fields do not match.");
        return false;
    }
    // email validation
    var pattern = /^[a-z]\w+\@\w+\.\w+/i;
    var result = pattern.test(email);
    if (result == false) {
        alert('Incorrect Email!!!');
    }

    // date of birth validation
    var dobDate = new Date(dob);
    var today = new Date();
    var age = today.getFullYear() - dobDate.getFullYear();

    // Check if the birthday hasn't occurred yet this year
    if (
        today.getMonth() < dobDate.getMonth() ||
        (today.getMonth() === dobDate.getMonth() && today.getDate() < dobDate.getDate())    //month hasn't occured ||(same month && day hasn't occured)
    ) {
        age--;
    }

    if (age < 18) {
        alert("You must be at least 18 years old");
        return false;
    }
    else if (age > 100) {
        alert("Enter validate birth date");
    }
    // Country Validation
    if (country == "Select your country") {
        alert("Please select a valid country!");
        return false;
    }
    // gender validation
    if (!gender) {
        alert("Gender is required!");
        return false;
    }

    return true; // All validations passed


}