Enumerable = require('linq');

$(document).ready(function () {
    $.fn.cm_search = function (options) {
        $(options.target).css('max-height','300px');
        $(options.target).css('overflow-y','scroll');
        var data;
        if(options.ajax){
            switch (typeof options.ajax) {
                case "string":
                    options.ajax = {url: options.ajax};
                case "object":
                    options.ajax.success = function (r){
                        data = r;
                    };
                    options.ajax.error =  function (r){
                        console.warn("cm_search: ",r);
                    };
                    $.ajax(options.ajax);
                    break;
                default:
                    console.warn("cm_search: Invalid ajax configuration");
                    break;
            }
        }else if(options.data){
            data = options.data;
        }else{
            console.warn("cm_search: No data source found please use data or ajax");
        }

        var transform = options.transform ? options.transform : function (data) {
            var temp = '<a class="list-group-item list-group-item-action" onclick=\'addItemToForm('+JSON.stringify(data)+')\'>';
            for(var key in data){
                temp += data[key] + " ";
            }

            temp +='</a>';
            return temp;
        }

        var search = function(cm_data,query,cm_group,cm_searchable,cm_target,target,all){
            var queryResults = Enumerable.from(cm_data).where(function (x) {
                if (all){
                    if(options.stocks){
                        if(x.stocks > 0)
                            return true;
                    }else{
                        return true;
                    }
                }
                if(cm_searchable){
                    for(let i = 0; i < cm_searchable.length;i++){
                        if (String(x[cm_searchable[i]]).toLowerCase().indexOf(query.toLowerCase()) !== -1)
                            if(options.stocks){
                                if(x.stocks > 0)
                                    return true;
                            }else{
                                return true;
                            }
                    }
                }else{
                    for (var key in x) {
                        if (String(x[key]).toLowerCase().indexOf(query.toLowerCase()) !== -1)
                            if(options.stocks){
                                if(x.stocks > 0)
                                    return true;
                            }else{
                                return true;
                            }
                    }
                }

            }).toArray();

            if(queryResults.length == 0){
                var temp = '<a class="list-group-item list-group-item-action active">Results </a>';
                $(cm_target + " " +target).append(temp);
                $(cm_target + " " +target).append('<a  class="list-group-item list-group-item-action"> No Results Found</a>');

            }else{
                $.each(queryResults, function (index, value) {
                    if(!($(target).length>0))
                        return;
                    var element = transform(value);
                    var targetId = $(target)[0].id;
                    if(cm_group){
                        if($(cm_target + " " +target +" "+target+"-"+value[cm_group]).length >0){
                            $(cm_target + " " +target +" "+target+"-"+value[cm_group]).append(element);
                        }else{
                            var temp = '<div class="row-fluid" id="'+targetId+'-'+value[cm_group]+'">' +
                                '<a class="list-group-item list-group-item-action active">'+value[cm_group] +' </a>' +
                                '</div>';
                            $(cm_target + " " +target).append(temp);
                            $(cm_target + " " +target +" "+target+"-"+value[cm_group]).append(element);
                        }

                    }else{
                        if($(cm_target + " " +target +" "+target+"-results").length >0){
                            $(cm_target + " " +target +" "+target+"-results").append(element);
                        }else{
                            var temp = '<div class="row-fluid" id="'+targetId+'-results'+'">' +
                                '<a class="list-group-item list-group-item-action active">Results </a>' +
                                '</div>';
                            $(cm_target + " " +target).append(temp);
                            $(cm_target + " " +target +" "+target+"-results").append(element);
                        }
                    }
                });
            }

        };

        return this.each(function() {
            $(this).on('keyup',function () {
                var cm_group = options.group;
                var cm_target =options.target;
                var cm_data = data;
                var cm_searchable = options.searchable;
                if(!$(this).val()) {
                    $(cm_target).hide();
                    $(cm_target).html('');
                }else{
                    $(cm_target).html('');
                    $(cm_target).show();
                    var rand = Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);
                    var temp = '<div id="cm_search-target-'+rand+'"></div>';
                    var target = "#cm_search-target-"+rand;
                    $(cm_target).html(temp);
                    var all = false;
                    if(this.value == " ")
                        all = true;
                    search(cm_data,this.value,cm_group,cm_searchable,cm_target,target,all)
                }
            });
            $(this).on('blur',function (e) {
                setTimeout(function() {
                    $(options.target).hide();
                }, 300);
            });

            $(this).on('focus',function () {
                if(!$(options.target).is(':empty'))
                    $(options.target).show();
            });
        });
    };
});