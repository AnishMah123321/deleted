
    $("#addUsers").validate( {
        rules:{
            email: {
                required: true,
                email: true,
            },
            name: "required",
            username: "required",
            password:{
                required : true,
                minlength: 8,
                maxlength :30,
            },
            contact:{
                required : true,
                digits : true,
                min: 9000000000,
                max : 9999999999,
            },
           
    },
    messages:{
        email:{
            required:"Please enter email",
            email:"plese enter valid email",
        },
        name:"Please enter your name",
        username:"Please enter username",
        password:{
            required : "Pleses enter password",
            minlength: "Minimum password required = 8",
            maxlength: "Maximum password supported = 30",
        },
        contact:{
                required : "Please enter your contact no.",
                digits : "Incorrect Mobile no. (only numbers) Format: 9XXXXXXXXX",
                min: "Incorrect Mobile no. Format: 9XXXXXXXXX",
                max: "Incorrect Mobile no. Format: 9XXXXXXXXX",
            }
    }
});
