var edit_buttons = document.querySelectorAll('#edit-comment')
// .innerHTML = 'smth'
Array.from(edit_buttons).forEach(function(btn){
    btn.addEventListener('click', function(){
        let form = btn.parentNode.parentNode.parentNode.querySelector('.edit-form').cloneNode(true)
        console.log(form)
        
    })
})

