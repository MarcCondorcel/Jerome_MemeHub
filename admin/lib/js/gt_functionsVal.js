$(document).ready(function () {

    //pour pouvoir utiliser regex
    $.validator.addMethod("regex", function (value, element, regexpr) {
        return regexpr.test(value);
    }, "Format non valide.");

    $("#form_inscription").validate({
        rules: {
            mail: "required",
            reg_email: {
                equalTo: "#mail"
            },
            mdp: "required", minlength: 3,

            mdp2: {
                equalTo: "#mdp"
            },
            nom: "required",
            prenom: "required",
            adresse: "required",
            ville: "required",
            tel: {
                required: true,
                regex: /^(0)[0-9]{2,3}\/[0-9]{2}\.[0-9]{2}\.[0-9]{2}$/
            },
            submitHandler: function (form) {
                form.submit();
            }
        }
    });

    $("#form_connexion").validate({
        rules: {
            email3: "required",
            mdp3: "required",
            submitHandler: function (form) {
                form.submit();
            }
        }
    });

    //TRADUCTION DES MESSAGES DE VALIDATION EN FRANÇAIS
    $.extend($.validator.messages, {
        required: "Veuillez renseigner ce champ.",
        mail: "Veuillez renseigner un email valide.",
        url: "Url non conforme.",
        date: "Date non valide.",
        number: "Veuillez n'entrer que des chiffres.",
        digits: "Veuillez n'entrer que des chiffres.",
        equalTo: "Les champs ne concordent pas.",
        maxlength: $.validator.format("Entrez au maximum {0} caract&egrave;res."),
        minlength: $.validator.format("Entrez au minimum {0} caract&egrave;res."),
        rangelength: $.validator.format("Votre entrée doit compter entre {0} et {1} caract&egrave;res."),
        range: $.validator.format("Entrez un nombre entre {0} et {1}."),
        max: $.validator.format("Entrez un nombre inférieur ou égal à {0}."),
        min: $.validator.format("Entrz un nombre de minimum {0}."),
        regex: "Format non conforme"
    });

});




(function ($) {
    "use strict";
    $("#login-form").validate({
        rules: {
            email3: "required",
            mdp3: "required",
        },
        errorClass: "Format invalide"
    });

    // Form Submission
    $("#login-form").submit(function () {
        remove_loading($(this));

        if (options['useAJAX'] == true)
        {
            // Dummy AJAX request (Replace this with your AJAX code)
            // If you don't want to use AJAX, remove this
            dummy_submit_form($(this));

            // Cancel the normal submission.
            // If you don't want to use AJAX, remove this
            return false;
        }
    });

    // Register Form
    //----------------------------------------------
    // Validation
    $("#register-form").validate({
        rules: {
            mail: "required",
            mdp3: {
                required: true,
                minlength: 3
            },
            reg_password_confirm: {
                required: true,
                minlength: 3,
                equalTo: "#register-form [name=reg_password]"
            },

            reg_agree: "required",
        },
        errorClass: "form-invalid",
        errorPlacement: function (label, element) {
            if (element.attr("type") === "checkbox" || element.attr("type") === "radio") {
                element.parent().append(label); // this would append the label after all your checkboxes/labels (so the error-label will be the last element in <div class="controls"> )
            } else {
                label.insertAfter(element); // standard behaviour
            }
        }
    });

    // Form Submission
    $("#register-form").submit(function () {
        remove_loading($(this));

        if (options['useAJAX'] == true)
        {
            // Dummy AJAX request (Replace this with your AJAX code)
            // If you don't want to use AJAX, remove this
            dummy_submit_form($(this));

            // Cancel the normal submission.
            // If you don't want to use AJAX, remove this
            return false;
        }
    });


    function remove_loading($form)
    {
        $form.find('[type=submit]').removeClass('error success');
        $form.find('.login-form-main-message').removeClass('show error success').html('');
    }

    function form_loading($form)
    {
        $form.find('[type=submit]').addClass('clicked').html(options['btn-loading']);
    }

    function form_success($form)
    {
        $form.find('[type=submit]').addClass('success').html(options['btn-success']);
        $form.find('.login-form-main-message').addClass('show success').html(options['msg-success']);
    }

    function form_failed($form)
    {
        $form.find('[type=submit]').addClass('error').html(options['btn-error']);
        $form.find('.login-form-main-message').addClass('show error').html(options['msg-error']);
    }

    // Dummy Submit Form (Remove this)
    //----------------------------------------------
    // This is just a dummy form submission. You should use your AJAX function or remove this function if you are not using AJAX.
    function dummy_submit_form($form)
    {
        if ($form.valid())
        {
            form_loading($form);

            setTimeout(function () {
                form_success($form);
            }, 2000);
        }
    }

})(jQuery);

// Original JavaScript code by Chirp Internet: www.chirp.com.au
// Please acknowledge use of this code by including this header.

var modal_init = function () {

    var modalWrapper = document.getElementById("modal_wrapper");
    var modalWindow = document.getElementById("modal_window");
    var openModal = function (e)
    {
        modalWrapper.className = "overlay";
        var overflow = modalWindow.offsetHeight - document.documentElement.clientHeight;
        if (overflow > 0) {
            modalWindow.style.maxHeight = (parseInt(window.getComputedStyle(modalWindow).height) - overflow) + "px";
        }
        modalWindow.style.marginTop = (-modalWindow.offsetHeight) / 2 + "px";
        modalWindow.style.marginLeft = (-modalWindow.offsetWidth) / 2 + "px";
        e.preventDefault ? e.preventDefault() : e.returnValue = false;
    };
    var closeModal = function (e)
    {
        modalWrapper.className = "";
        e.preventDefault ? e.preventDefault() : e.returnValue = false;
    };
    var clickHandler = function (e) {
        if (!e.target)
            e.target = e.srcElement;
        if (e.target.tagName == "DIV") {
            if (e.target.id != "modal_window")
                closeModal(e);
        }
    };
    var keyHandler = function (e) {
        if (e.keyCode == 27)
            closeModal(e);
    };
    if (document.addEventListener) {
        document.getElementById("modal_open").addEventListener("click", openModal, false);
        document.getElementById("modal_close").addEventListener("click", closeModal, false);
        document.addEventListener("click", clickHandler, false);
        document.addEventListener("keydown", keyHandler, false);
    } else {
        document.getElementById("modal_open").attachEvent("onclick", openModal);
        document.getElementById("modal_close").attachEvent("onclick", closeModal);
        document.attachEvent("onclick", clickHandler);
        document.attachEvent("onkeydown", keyHandler);
    }

};
// Original JavaScript code by Chirp Internet: www.chirp.com.au
// Please acknowledge use of this code by including this header.

var checkForm = function (e)
{
    var form = (e.target) ? e.target : e.srcElement;
    if (form.email.value == "") {
        alert("Entrez une adresse mail valide");
        form.email.focus();
        e.preventDefault ? e.preventDefault() : e.returnValue = false;
        return;
    }
    if (form.message.value == "") {
        alert("Please ");
        form.message.focus();
        e.preventDefault ? e.preventDefault() : e.returnValue = false;
        return;
    }
};
if (document.addEventListener) {
    document.getElementById("modal_feedback").addEventListener("submit", checkForm, false);
    document.addEventListener("DOMContentLoaded", modal_init, false);
} else {
    document.getElementById("modal_feedback").attachEvent("onsubmit", checkForm);
    window.attachEvent("onload", modal_init);
}

