/**
 * How to create five equal columns in Bootstrap 3?
 * @author Dhiren Patel
 * @link http://www.dhirenpatel.me/create-five-equal-columns-bootstrap-3/
 */

.col-xs-55, .col-sm-55, .col-md-55, .col-lg-55{
    position: relative;
    min-height: 1px;
    padding-right: 10px;
    padding-left: 10px;
}
.col-xs-55 {
    float:left;
}
.col-xs-55 {
    width: 20%
}

@media (min-width:768px) {
    .col-sm-55 {
        float: left
    }
    .col-sm-55 {
        width: 20%
    }
}

@media (min-width:992px) {
    .col-md-55 {
        float: left
    }
    .col-md-55 {
        width: 20%;
    }
}

@media (min-width:1200px) {
    .col-lg-55 {
        float: left
    }
    .col-lg-55 {
        width: 20%
    }
}