Javascript - how to
====================

Remove a row when the remove button is clicked
----------------------------------------------

//check that page has loaded before running functions

if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready()
    }
    
    // remove items when the button is clicked
function ready() {
    var removeCartItemButtons = document.getElementsByClassName('button alert')
    for (var i = 0; i < removeCartItemButtons.length; i++) {
        var button = removeCartItemButtons[i]
        button.addEventListener('click', removeCartItem)
    }
    
    function removeCartItem(event) {
    var buttonClicked = event.target
    buttonClicked.parentElement.parentElement.remove()
    updateCartTotal()
}
