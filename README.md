I ran into a problem when using the typeahead script - the error "it.lowercase()" was constantly coming up. After analyzing the code, I found out that for typeahead to work correctly, only one key with the name "name" must be specified. I needed to search through several database fields and according to their IDs.
As a result, through a small crutch in the typeahead script, we managed to achieve the desired result.
To use the proposed script correctly, in the "head" header, before loading the "typeahead" script in the "global_arr_keys_check" array, you must specify the database fields that will be searched.
My option:
var global_arr_keys_check = ['user_name', 'user_login'];
I'm far from a professional programmer, I've touched on this topic recently. Most likely there is a more correct solution, but I'm laying out what I've got and what works. In fact, only the verification of the received string from the database has been changed in the code. I didn't touch anything else. I avoided binding to the "name" key by replacing it with keys from my "global_arr_keys_check" array.

Replaced the check with 

return typeof item!=="undefined"&&typeof item.name !="undefined"&&item.name||item}

on

let arr_undefined = new Array();
$.each(global_arr_keys_check, function(index, key_check){ 
    arr_undefined.push(typeof item[key_check]);
});

let key;
let substr = this.$element.val();
$.each(global_arr_keys_check, function(index, key_check){
    if (item[key_check] && item[key_check].toLowerCase().indexOf(substr) != -1) {
        key = key_check;
        return false;
    }
});

return typeof item!=="undefined"&&(arr_undefined.indexOf("undefined") == -1)&&item[key]||item                                
