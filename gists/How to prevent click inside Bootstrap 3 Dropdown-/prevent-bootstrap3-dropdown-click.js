/**
 * How to prevent click inside Bootstrap 3 Dropdown?
 * @author Dhiren Patel
 * @link http://www.dhirenpatel.me/blog/
 */
 
$('.dropdown-menu').on("click.bs.dropdown",function(e){ 

    e.stopPropagation(); 
    e.preventDefault();

});