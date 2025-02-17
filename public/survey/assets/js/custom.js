// next prev
var divs = $('.show-section section');
var now = 0; // currently shown div
divs.hide().first().show(); // hide all divs except first






function next()
{
    divs.eq(now).hide();
    now = (now + 1 < divs.length) ? now + 1 : 0;
    divs.eq(now).show(); // show next
    console.log(now);

}

$('.radioField2').click(function()
{
    $('.radioField2').removeClass('checked')
    $('.radioField2 input').attr("checked", false)
    $(this).addClass('checked')
    $(this).children('input').attr("checked", true);
})


// quiz validation
var checkedradio = false;

function radiovalidate(stepnumber)
{
    var checkradio = $("#step"+stepnumber+" input").map(function()
    {
    if($(this).is(':checked'))
    {
        return true;
    }
    else
    {
        return false;
    }
    }).get();

    checkedradio = checkradio.some(Boolean);
}
    // check step1
    $("#step1btn").on('click', function()
    {
        radiovalidate(1);

        if(checkedradio == false)
        {
            
        (function (el) {
            setTimeout(function () {
                el.children().remove('.reveal');
            }, 3000);
            }($('#error').append('<div class="reveal alert alert-danger">Choose an option!</div>')));
            
            radiovalidate(1);

        }

        else
        {

            next();

        }
    })

    // check last step
    $("#sub").on('click', function()
    {
        radiovalidate(2);

        if(checkedradio == false)
        {
            
        (function (el) {
            setTimeout(function () {
                el.children().remove('.reveal');
            }, 3000);
            }($('#error').append('<div class="reveal alert alert-danger">Choose an option!</div>')));
            
            radiovalidate(2);

        }

        else
        {
            $('.surveyForm').addClass('d-none');
            $('.loading').addClass('d-grid')
            setTimeout(function()
            {
                $('.loading').removeClass('d-grid')
                $('.loading').addClass('d-none')
                $('.thankyou').addClass('d-grid')
            }, 2000)

            $("#sub").html('done');

        }
    })