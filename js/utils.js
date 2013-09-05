

String.prototype.ToDate = function(){
    if ( this.indexOf('/')==2)
    {
        var year = this.substring(6,10);
        var month = this.substring(3,5);
        var day = this.substring(0,2);
    }
    else
    {
        var year = this.substring(0,4);
        var month = this.substring(5,7);
        var day = this.substring(8,10);
    }
    return new Date(year, month-1, day);

}
