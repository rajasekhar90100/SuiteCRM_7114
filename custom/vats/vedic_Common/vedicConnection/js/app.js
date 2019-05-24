document.writeln("<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>");
document.writeln("<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js'></script>");


! function(t) {
    "use strict";
    t.module("vspachart", ["ngRoute", "chart.js", "ui.bootstrap", "toastr", "vspachart.loader", "satellizer", "environment", "angularFileUpload", "ngDialog"])
}

(angular),
function(t) {
    "use strict";

    function e() {
        return {
            restrict: "E",
            transclude: !0,
            scope: !0,
            templateUrl: "app/components/tabs/tabs.html",
            controller: n
        }
    }

    function n(t, e) {
        function n(t) {
            return i === t
        }

        function a(e, n) {
            0 === t.tabs.length ? n.selected = !0 : n.selected = !1, t.tabs.push({
                title: e,
                scope: n
            })
        }

        function o(n) {
            i = n;
            for (var a = 0; a < t.tabs.length; a++) t.tabs[a].scope.selected = i === a;
            e.emit("TAB_CLICKED", t.tabs[i].title)
        }
        var i = 0;
        t.tabs = [], t.isSelectedTab = n, this.registerTab = a, t.selectTab = o
    }
    n.$inject = ["$scope", "busService"], t.module("vspachart").directive("tabs", e)
}

(angular),
function(t) {
    "use strict";

    function e() {
        return {
            restrict: "E",
            transclude: !0,
            template: '<div ng-show="selected" ng-transclude></div>',
            require: "^tabs",
            scope: !0,
            link: n
        }
    }

    function n(t, e, n, a) {
        a.registerTab(n.title, t)
    }
    t.module("vspachart").directive("tab", e)
}

(angular),
function(t) {
    "use strict";
// function is used to add subordinate
    function e(t, e, n, a) {
        var o, i = this,
            r = t.ngDialogData,
            c = r.popupType,
            l = r.nodedata;
        if (console.log(l), c === e.ADD_NEW_NODE) i.firstname = r.suggestedName || "", i.lastname = "", i.title = r.suggestedTitle || "", i.email = r.suggestedEmail || "", i.neutral = !0, i.alignment = {
            name: e.NEUTRAL
        }, i.economic = !1, i.technical = !1, i.competition = !1;
        else if (c === e.UPDATE_NODE) {
            i.firstname = l.first_name, i.lastname = l.last_name, i.title = l.Title, l.Name.toLowerCase().indexOf("unknown") > -1 ? i.email = "" : i.email = l.Email || "", l[e.vspachart_designation__c] && (o = l[e.vspachart_designation__c], i.economic = o.indexOf(e.ECONOMIC) > -1, i.technical = o.indexOf(e.TECHNICAL) > -1, i.competition = o.indexOf(e.COMPETITIVE) > -1);
            var s = l[e.vspachart_alignment__c] || e.NEUTRAL;
            s = s.trim(), s === e.CHAMPION ? i.alignment = {
                name: e.CHAMPION
            } : s === e.BLOCKER ? i.alignment = {
                name: e.BLOCKER
            } : s === e.NEUTRAL && (i.alignment = {
                name: e.NEUTRAL
            })
        }
        i.oldEmail = i.email, i.emailValidator = function() {
            return i.emailFormat = /^[a-zA-Z]+[a-zA-Z0-9._]+@[a-zA-Z0-9]+\.[a-zA-Z.]{2,5}$/, console.log("Email : " + i.emailFormat.test(i.email)), i.emailFormat.test(i.email)
        }, i.save = function() {
            var o, s, d, u = [],
                p = i.alignment.name;
            if (i.economic && u.push(e.ECONOMIC), i.technical && u.push(e.TECHNICAL), i.competition && u.push(e.COMPETITIVE), s = u.length > 0 ? u.join(";") : "", c === e.ADD_NEW_NODE) {
                d = {
                    first_name: i.firstname,
                    last_name: i.lastname,
                    title: i.title,
                    reports_to_id: l.Id,
                    account_id: l.AccountId,
                    email1: i.email.toLowerCase()
                }, d[e.vspachart_designation__c] = s, d[e.vspachart_alignment__c] = p, l[e.Lifecycle_Status__c] === e.LIFECYCLE_STATUS && (d[e.Lifecycle_Status__c] = e.LIFECYCLE_STATUS), a.showLoading("Inserting...");
                var h = n.insertNewNode(d);
                t.closeThisDialog({
                    promise: h,
                    newNodeParent: r.nodedata,
                    newNode: d
                })
            } else if (c === e.UPDATE_NODE) {
                o = {
                    first_name: i.firstname,
                    last_name: i.lastname,
                    title: i.title,
                    email1: i.email.toLowerCase()
                }, o[e.vspachart_designation__c] = s, o[e.vspachart_alignment__c] = p, a.showLoading("Updating...");
                var h = n.updateJsonData(l.Id, o);
                t.closeThisDialog({
                    promise: h,
                    newNode: o
                });
				console.log(o+"<<<<<<<<<<<<<<<");
            }
            i.oldEmail !== i.email
        }
    }
    e.$inject = ["$scope", "CONSTANTS", "dataService", "loaderService"], t.module("vspachart").controller("PopupPropertiesController", e)
}

(angular),
function(t) {
    "use strict";

    function e(t, e, n, a) {
        var o = this,
            i = t.ngDialogData.data;
        o.root = i.root, o.unknown = i.unknwon, o.parent = function() {
            t.closeThisDialog({
                selected: e.PARENT
            })
        }, o.replace = function() {
            t.closeThisDialog({
                selected: e.REPLACE
            })
        }, o.child = function() {
            t.closeThisDialog({
                selected: e.CHILD
            })
        }
    }
    e.$inject = ["$scope", "CONSTANTS", "dataService", "loaderService", "$location"], t.module("vspachart").controller("ArrowsController", e)
}

(angular),
function() {
    "use strict";
    angular.module("vspachart.loader", [])
}(),
function(t) {
    "use strict";

    function e() {
        function e() {
            var t = document.getElementById("loading");
            t && (t.style.display = "none")
        }

        function n(e) {
            e = e || "loading...";
            var n = document.getElementById("loading");
            n || (t.element(document.body).append('<div id="loading"></div>'), n = document.getElementById("loading")), n.style.display = "block", n.innerHTML = "", n.innerHTML = e
        }
        var a = {
            showLoading: n,
            hideLoading: e
        };
        return a
    }
    t.module("vspachart.loader").service("loaderService", e)
}(angular),
function(t) {
    "use strict";

    function e(t, e, n, a, o, i, r) {
        function c() {
            n.emit("updateData", y)
        }

        function l() {
            n.emit("suggestedContactsData", C)
        }

        function s(e) {
			//$(window).load(function() {
	$(".loader").fadeOut("slow");
//})
			var url_string       = window.location.href;     // Returns full URL
			var url = new URL(url_string);
			var send_aid = url.searchParams.get("aId");
			var oAuthKey = $.cookie("apiUserToken");
            console.log("fetchJsonData>>"+$.cookie("apiUserToken"));
            //var n = "rest/v10/Contacts/custom_Contact?aId="+send_aid+"&OAuth-Token="+oAuthKey;
			//var n = "custom/modules/vedic_common/vedicConnection/api/getCRMData.php";
			var n = "index.php?entryPoint=GetUsers";
            return t.get(n).success(function(t) {
				$("#danger").text("Vedicsoft Organization Chart");
                console.log(t);
                var e = d(t.data.contactdata),
                    n = [];
                v(); 
                for (var a = 0; a < e.length; a++) e[a].children || (n.push(e.splice(a, 1)), a -= 1);
                return n.forEach(function(t) {
                    e.push(t[0])
                }), p(e), e
            })
			
			
		
        }

        function d(t) {
            console.log("records"), console.log(t);
            var e = [],
                n = {};
            if (t.length) {
                t.forEach(function(t) {
                    n[t.Id] = t
                });
                t.length;
                Object.keys(n).forEach(function(t, a) {
                    var o = n[t];
                    if (console.log("hello " + a), console.log(o), o.ReportsToId) {
                        if (o.ReportsToId in n || !o.ReportsToId) {
                            var i = n[o.ReportsToId];
                            "children" in i || (i.children = []), i.children.push(o)
                        }
                    } else e.push(o)
                });
                for (var a = 1; a < e.length && e[0].Lifecycle_Status__c !== r.LIFECYCLE_STATUS; a++)
                    if (e[a].Lifecycle_Status__c === r.LIFECYCLE_STATUS) {
                        var o = e[a];
                        e[a] = e[0], e[0] = o;
                        break
                    }
            }
            return e
        }
// function to add new user
        function u(e) {
			var oAuthKey = $.cookie("apiUserToken");
            var n = ({
                Id: localStorage.id,
                uId: localStorage.uid
            }, "rest/v10/Contacts"+"?OAuth-Token="+oAuthKey); // add subordinate in vspa rm chart
            return t.post(n, e)
        }

        function p(t) {
            y = t, c()
        }

        function h(e, n) {
			var oAuthKey = $.cookie("apiUserToken");
            var a = {
                Id: localStorage.id,
                uId: localStorage.uid
            };
			console.log("1");
            console.log(a);
            // var o = b + "updateUserSugarCRM/" + e;
            // return t.patch(o, n)
			 var o = "rest/v10/Contacts/updateProperties?contactId=" + e+"&OAuth-Token="+oAuthKey; // update properties in vspa rm chart
            return t.post(o, n)
        }
// function to update hierarchy
        function g(e) {
			var oAuthKey = $.cookie("apiUserToken");
            var n = {
                    Id: localStorage.id,
                    uId: localStorage.uid
                },
				 //a = b + "batchUpdateContactsSugarCrm/" + n.Id;
				//a = "rest/v10/Contacts/"+localStorage.id+"?OAuth-Token="+oAuthKey;	
//console.log("yevadu==="+t[z.Id].id+">>ReoportsTo>>>"+V.Id);				
				a = "rest/v10/Contacts/remove_assign";
				
            return t.post(a, e).success(function(t) {
                for (var e = t.length - 1, n = d(t[e].contents.contactdata), a = [], o = 0; o < n.length; o++) n[o].children || (a.push(n.splice(o, 1)), o -= 1);
                return a.forEach(function(t) {
                    n.push(t[0])
                }), p(n), n
            })
        }

        function f(e) {
            console.log("uploadData ->>");
            var n = b + "uploadData/" + localStorage.uid;
            return t.post(n, e)
        }

        function m(e) {
            console.log("fetchUserData -->");
            var n = b + "FetchUserProfile/" + e + "/" + localStorage.orgId;
            return t.get(n)
        }

        function _() {
            console.log("getSFDCEnv -->");
            var e = "custom/vats/vedic_Common/vedicConnection/api/getCRMData.php";
            return t.get(e)
        }

        function v() {
            var e = "custom/vats/vedic_Common/vedicConnection/api/suggested-contacts.json";
            t.get(e).success(function(t) {
                C = t, l()
            })
        }
        var y, C, b = o.read("serviceUrl"),
            x = {
                fetchJsonData: s,
                updateJsonData: h,
                insertNewNode: u,
                uploadSMData: f,
                contactsBulkUpdate: g,
                fetchUserData: m,
                getSFDCEnv: _
            };
        return x
    }
    e.$inject = ["$http", "$q", "busService", "$location", "envService", "beanDataService", "CONSTANTS"], t.module("vspachart").service("dataService", e)
}(angular),
function(t) {
    "use strict";

    function e() {
        function t() {
            return n
        }

        function e(t) {
            n = t
        }
        var n = {},
            a = {
                getUserData: t,
                setUserData: e
            };
        return a
    }
    t.module("vspachart").service("beanDataService", e)
}(angular),
function(t) {
    "use strict";

    function e(t) {
        function e(e, n) {
            function a() {
                d3.select(".d3-context-menu").style("display", "none"), d3.selectAll("#fo-contextmenu").remove(), d3.selectAll("#line-contextmenu").remove(), d3.selectAll(".mainRectOverlay").classed("mainRectOverlay", !1).classed("mainRect", !0), d3.selectAll(".scoreRectOverlay").classed("scoreRectOverlay", !1).classed("scoreRect", !0)
            }
            return d3.selectAll(".d3-context-menu").data([1]).enter().append("div").attr("class", "d3-context-menu"), d3.select("body").on("click.d3-context-menu", a).on("touchstart", a),
                function(a, o) {
                    var i = e;
                    a.Contact_Relationships__r || (i = e.slice(1, e.length)), (a.Name.toLowerCase().indexOf(t.UNKNOWN) > -1 || !a.ReportsToId && !a.children && !a._children) && (i = i.slice(0, i.length - 1));
                    var r = this;
                    d3.selectAll(".d3-context-menu").html("");
                    var c = d3.selectAll(".d3-context-menu").append("ul");
                    c.attr("id", "contact-menu"), c.selectAll("li").data(i).enter().append("li").html(function(t) {
                        return t.title
                    }).on("click", function(t, e) {
                        t.action(r, a, o), d3.select(".d3-context-menu").style("display", "none")
                    }), n && n(a, o), d3.select(".d3-context-menu").style("left", d3.event.pageX - 2 + "px").style("top", d3.event.pageY - 2 + "px").style("display", "block"), d3.event.preventDefault()
                }
        }
        var n = {
           // menu: e
        };
        return n
    }
    e.$inject = ["CONSTANTS"], t.module("vspachart").service("d3ContextMenuService", e)
}(angular),
function(t) {
    "use strict";

    function e() {
        function t(t, e) {
            a[t] || (a[t] = []), a[t].push(e)
        }

        function e(t, e) {
            return a[t] ? (a[t].forEach(function(t) {
                t(e)
            }), !0) : !1
        }

        function n(t) {
            return !!a[t]
        }
        var a = {},
            o = {
                on: t,
                emit: e,
                isEventExists: n
            };
        return o
    }
    t.module("vspachart").service("busService", e)
}(angular),
function(t) {
    "use strict";

    function e(t, e, n) {
        console.info("Ctrl -> WelcomeController"), e.state = "", e.states = ["Haryana", "Punjab"], e.city = "", e.citiesInState = [], e.cities = [{
            name: "Gurgaon",
            state: "Haryana"
        }, {
            name: "Ambala",
            state: "Punjab"
        }], e.labels = [], e.series = [], e.data = [], e.onClick = function(t, e) {
            console.log(t, e)
        }, e.options = {
            legend: {
                display: !0,
                labels: {
                    fontColor: "rgb(255, 99, 132)"
                }
            },
            xValueType: "dateTime",
            elements: {
                line: {
                    fill: !1
                }
            }
        }, e.colors = ["#72C02C", "#3498DB", "#717984"], e.getCity = function() {
            console.log("getCity"), e.citiesInState = e.cities[e.state]
        }, e.getData = function() {
            var t = "http://104.197.31.161:5000/tomatoes/api/v1.0/get/" + e.state + "/" + e.city;
            n.get(t).success(function(t) {
                for (var n = 0; n < t.date.length; n++) {
                    var a = new Date(1e3 * parseInt(t.date[n]));
					console.log("2");
                    console.log(a.toString()), e.labels.push(a.toLocaleDateString())
                }
                e.series = ["Actual", "Predicted_1", "Predicted_60"];
                var o = [];
                o.push(t.actual), o.push(t.predicted_1), o.push(t.predicted_60), e.data = o
            })
        }, n.get("./app/welcome-wizard/market.json").success(function(t) {
            e.cities = t, e.states = Object.keys(e.cities), console.log(e.states)
        })
    }
    e.$inject = ["$location", "$scope", "$http"], t.module("vspachart").controller("WelcomeController", e)
}(angular),
function(t) {
    "use strict";

    function e(t, e, n) {
        return {
            restrict: "E",
            replace: !0,
            templateUrl: "app/tree-chart/treechart.dir.html",
            scope: {
                data: "="
            },
            link: function(a, o) {
                function i(t, a) {
                    "undefined" != typeof a && (n.hideLoading(), e.drawVspaTree(a, t))
                }
                a.$watch("data", i.bind(null, "Relationship")), t.on("TAB_CLICKED", function(t) {
                    i.setTabName = t, a.$watch("data", i.bind(null, t))
                })
            }
        }
    }
    e.$inject = ["busService", "buildtreeService", "loaderService"], t.module("vspachart").directive("treeChart", e)
}(angular),
function(t) {
    "use strict";

    function e(e, n, a, o, i, r, c, l, s) {
        var d = this;
        d.accountName = "Loading...", d.pos = -1, d.isSuggest = !1, d.toggle = !1, d.droppos = {}, d.isError = !1, d.widthAdjustClass = "col-md-12", d.elmWidth = l.innerWidth, n.on("updateData", function(e) {
            d.data = t.copy(e), d.data[0] ? d.accountName = "Relationship matrix for " + d.data[0].Account.Name : d.accountName = "?"
        }), n.on("headerData", function(e) {
            d.accountName = t.copy(e)
        }), n.on("suggestedContactsData", function(e) {
            console.log("Suggested Contact."), d.suggestList = t.copy(e), d.selected = null, d.suggestedContacts = e.records, d.isSuggest = !0
        }), d.dropDragOver = function(t, e, n, a, o) {
            d.droppos = t
        }, d.dragend = function(t, e) {
            var a, o;
            d.pos = e, o = r.getNodePositions().filter(function(t) {
                var e = d.droppos.clientX >= t.left && d.droppos.clientX <= t.right,
                    n = d.droppos.clientY >= t.top && d.droppos.clientY <= t.bottom;
                return e && n ? !0 : !1
            }), 1 === o.length && (console.log(o[0].d), a = d.suggestedContacts[e], n.emit("suggestedContactDropped", {
                d: o[0].d,
                droppedContact: d.suggestedContacts[e]
            }))
        }, n.on("suggestedContactAdded", function(t) {
            t && d.pos > -1 && (console.log(d.pos), d.suggestedContacts.splice(d.pos, 1), d.toggle = d.suggestedContacts.length ? !0 : !1)
        }), d.toggleSuggest = function() {
            d.suggestedContacts.length > 0 && (d.toggle = !d.toggle, d.toggle ? d.widthAdjustClass = "col-md-10" : d.widthAdjustClass = "col-md-12")
        }, d.openSettings = function() {
            s.path("/settings")
        }
    }
    e.$inject = ["$scope", "busService", "$auth", "dataService", "beanDataService", "buildtreeService", "toastr", "$window", "$location","$http"], t.module("vspachart").controller("TreeChartController", e)
}(angular),
function(t) {
    "use strict";
console.log("start");
    function e(e, n, a, o, i, r, c, l) {
		
		// custom code - below function is used when user right clicks
        function s(t) {
			
			console.log("3");
            console.log(t);
            //var e = !0;
            //return t[i.Lifecycle_Status__c] !== i.PRIMARY || !t.ReportsToId || t.children || t._children || t.parent.ReportsToId || 1 !== t.parent.children.length || (e = !1), e
        }

        function d(t, e, n, a) {
            var o = t.children || t._children || [];
            o && o.map(function(t) {
                a[t.Id] = {}, a[t.Id][e] = n, d(t, e, n, a)
            })
        }

        function u(t) {
            var e = t.toString(16);
            return 1 == e.length ? "0" + e : e
        }

        function p() {
            var t = [];
            return d3.selectAll("g.node").each(function(e) {
                var n = this.getBoundingClientRect();
                n.d = e, t.push(n)
            }), t
        }

        function h(t, e) {
            t.each(function() {
                var t = d3.select(this),
                    n = (t.node().getComputedTextLength(), t.text()),
                    a = n;
                a = a.length > e ? a.substr(0, e - 1) + "..." : a, t.text(a)
            })
        }

        function g(t) {
            var e = 0;
            return t.children && t.children.forEach(function(t) {
                var n = g(t);
                n > e && (e = n)
            }), 1 + e
        }

        function f(t) {
            var e = 0;
            if (!t) return e;
            for (var n = t.records, a = 0; a < n.length; a++) {
                var o = n[a];
                o[i.Standard_Score__c] = Math.ceil(o[i.Standard_Score__c]), null !== o[i.Standard_Score__c] && o[i.Standard_Score__c] > e && (e = Math.ceil(o[i.Standard_Score__c]))
            }
            return e
        }

        function m(t) {
            var e, n = {
                    red: 85,
                    green: 130,
                    blue: 53
                },
                a = {
                    red: 237,
                    green: 125,
                    blue: 49
                },
                o = {
                    red: n.red - a.red,
                    green: n.green - a.green,
                    blue: n.blue - a.blue
                },
                i = new Date,
                r = Math.abs(i.getTime() - t.getTime()),
                c = Math.ceil(r / 864e5),
                l = "#7c99d6",
                s = {};
            return 100 > c ? (e = c / 100, s.red = n.red - Math.round(o.red * e), s.green = n.green - Math.round(o.green * e), s.blue = n.blue - Math.round(o.blue * e), C(s.red, s.green, s.blue)) : c >= 100 ? C(a.red, a.green, a.blue) : l
        }

        function _() {
            return D
        }

        function v(t, e, n) {
            var a = g(t);
            return a * e + (a - 1) * n
        }

        function y(t, e) {
            t.Id === e.Id && (N = !0), t.children && t.children.forEach(function(t) {
                y(t, e)
            })
        }

        function C(t, e, n) {
            return "#" + u(t) + u(e) + u(n)
        }

        function b(t) {
            D = t
        }

        function x(t, e) {
			//console.log("4");
			console.log(e);
            t.each(function() {
                for (var t, n = d3.select(this), a = n.text().split(/\s+/).reverse(), o = [], i = 0, r = 1.1, c = n.attr("x"), l = n.attr("y"), s = 0, d = n.text(null).append("tspan").attr("x", "-35").attr("y", l).attr("dy", s + "em"); t = a.pop();) o.push(t), d.text(o.join(" ")), d.node().getComputedTextLength() > e && (o.pop(), d.text(o.join(" ")), o = [t], d = n.append("tspan").attr("x", "-35").attr("y", l).attr("dy", ++i * r + s + "em").text(t)) 
            })
        }

        function L() {
            for (var t = document.getElementsByClassName("txt-name"), a = 0; a < t.length; a++) t[a].className.indexOf(i.BLURRED_CLASS) < 0 && (t[a].className += " " + i.BLURRED_CLASS, t[a].addEventListener("blur", function(t) {
                var a = d3.select(this.parentNode.parentNode.parentNode).datum(),
                    i = d3.select(this.parentNode.parentNode),
                    r = this.value.trim(),
                    c = r.split(" ");
                if (r && r.length > 0 && r !== a.Name && c.length >= 2) {
                    a.Name = r, d3.select(this.parentNode.parentNode.previousSibling).text(r);
                    var l = {
                        first_name: c[0],
                        last_name: c[1]
                    };
                    n.showLoading("Updating...2");
                    var s = e.updateJsonData(a.Id, l);
                    s.success(function(t) {
                        o.success("Name updated successfully")
                    })["catch"](function(t) {
                        o.error("Name updation failed.Please report issue")
                    })["finally"](function() {
                        n.hideLoading()
                    })
                } else(!r || 0 === r.length || c.length < 2) && o.error("Please provide valid name");
                i.style("display", "none")
            }, !0))
        }

        function S() {
            for (var t = document.getElementsByClassName("txt-title-svg"), a = 0; a < t.length; a++) t[a].className.indexOf(i.BLURRED_CLASS) < 0 && (t[a].className += " " + i.BLURRED_CLASS, t[a].addEventListener("blur", function(t) {
                var a = d3.select(this.parentNode.parentNode.parentNode).datum(),
                    i = d3.select(this.parentNode.parentNode),
                    r = this.value.trim();
                if (0 === r.length && o.error("Please enter valid title"), r && r.length > 0 && r !== a.Title) {
                    a.Title = r, d3.select(this.parentNode.parentNode.previousSibling).text(r).call(h, 20);
                    var c = (name.split(" "), {
                        Title: r
                    });
                    n.showLoading("Updating...3");
                    var l = e.updateJsonData(a.Id, c);
                    l.success(function(t) {
                        o.success("Title updated successfully")
                    })["catch"](function(t) {
                        o.error("Title updation failed.Please report issue")
                    })["finally"](function() {
                        n.hideLoading()
                    })
                }
                i.style("display", "none")
            }, !0))
        }

        function I(t) {
            return t.toLowerCase().indexOf(i.UNKNOWN) > -1 ? !0 : !1
        }

        function T(t) {
            return !t.ReportsToId && t.children ? !0 : !1
        }

        function E(t, u) {
            w = t;
            var p, g, _, C, D, k, U, M, P, F, $ = c.innerWidth > 910 ? c.innerWidth : 910,
                j = .14 * $ > 180 ? 180 : .14 * $,
                Y = 80,
                W = {
                    top: 20,
                    right: 0,
                    bottom: 20,
                    left: 550
                },
                H = 40,
                q = 20,
                V = null,
                z = null,
                X = 0,
                J = 120,
                K = 0,
                Z = 0,
                G = 0,
                Q = 0,
                tt = !1,
                et = 0,
                nt = 20,
                at = 20;
            b(u), document.getElementById("svg-cont") && d3.select("#svg-cont").remove(), t.forEach(function(b, $) {
                function ot(t, e) {
                    if (z = t, d3.select(e).select(".ghostCircle").attr("pointer-events", "none"), d3.selectAll(".ghostCircle").attr("class", "ghostCircle show"), d3.select(e).attr("class", "node activeDrag"), St.selectAll("g.node").sort(function(t, e) {
                            return t.id != z.id ? 1 : -1
                        }), C.length > 1) {
                        var n = yt.links(C);
                        St.selectAll("path.link").data(n, function(t) {
                            return t.target.id
                        }).remove(), St.selectAll("g.node").data(C, function(t) {
                            return t.id
                        }).filter(function(t, e) {
                            return t.id == z.id ? !1 : !0
                        }).remove()
                    }
                    if (z.parent) {
                        yt.links(yt.nodes(z.parent));
                        St.selectAll("path.link").filter(function(t, e) {
                            return t.target.id == z.id ? !0 : !1
                        }).remove()
                    }
                    _ = null
                }

                function it(t, e, n) {
                    e = e || !1;
                    var a = r.open({
                        id: "arrowPop",
                        templateUrl: "app/components/popup-arrows/arrows.html",
                        appendClassName: "ngdialog-arrows",
                        showClose: !1,
                        controller: "ArrowsController",
                        controllerAs: "vm",
                        width: 80,
                        data: {
                            data: t
                        }
                    });
                    a.closePromise.then(function(t) {
                        var a = t.value;
                        e ? a.selected && ct(n, a) : a.selected === i.PARENT ? dt(!0) : a.selected === i.REPLACE ? st() : a.selected === i.CHILD ? dt() : (V = null, dt())
                    })
                }

                function rt(t, a, r, c) {
					console.log("5");
                    console.log(t);
                    var s = {};
                    if (r.Id = t.id, r.Name = r.first_name + " " + r.last_name, a.selected === i.PARENT) s[r.Id] = {
                        ReportsToId: null
                    }, s[c.Id] = {
                        ReportsToId: r.Id
                    };
                    else if (a.selected === i.REPLACE) {
                        "undefined" != typeof c.children ? (r.children = c.children, c.children = []) : (r._children = c._children, delete c._children);
                        var d = r.children || r._children || [];
                        d.map(function(t) {
                            s[t.Id] = {
                                ReportsToId: r.Id
                            }
                        }), s[r.Id] = {
                            ReportsToId: c.ReportsToId
                        }, s[c.Id] = {}, s[c.Id][i.Lifecycle_Status__c] = i.READY_TO_DELETE
                    } else a.selected === i.CHILD && (s[r.Id] = {
                        ReportsToId: c.Id,
                        Title: r.Title || "",
                        vspachart_designation__c: r[i.vspachart_designation__c] || "",
                        vspachart_alignment__c: r[i.vspachart_alignment__c] || ""
                    });
                    var u = e.contactsBulkUpdate(s);
                    u.success(function(t) {
                        o.success("Added successfully"), l.emit("suggestedContactAdded", !0), console.log(t)
                    })["catch"](function(t) {
                        console.log(t), o.error("Adding Failed")
                    })["finally"](function() {
                        n.hideLoading()
                    })
                }

                function ct(t, a) {
                    n.showLoading("Adding suggested contacts");
                    var o = t.d;
                    if (t.droppedContact.name && t.droppedContact.name.trim().indexOf(" ") > -1) {
                        var c = t.droppedContact.name.split(" "),
                            l = {
                                first_name: c[0] || "Suggested",
                                last_name: c[1] || "Unknown",
                                Title: t.droppedContact.title || "",
                                ReportsToId: o.ReportsToId,
                                AccountId: o.AccountId+">>>2",
                                Email: t.droppedContact.email
                            };
                        l[i.vspachart_designation__c] = "", l[i.vspachart_alignment__c] = i.NEUTRAL, l[i.Lifecycle_Status__c] = o[i.Lifecycle_Status__c];
                        var s = e.insertNewNode(l);
                        s.success(function(t) {
                            rt(t, a, l, o)
                        })
                    } else {
                        var d = r.open({
                            templateUrl: "app/components/popup-properties/popupprop.html",
                            appendClassName: "ngdialog-custom",
                            showClose: !1,
                            controller: "PopupPropertiesController",
                            controllerAs: "propertiesCtrl",
                            width: 620,
                            data: {
                                popupType: i.ADD_NEW_NODE,
                                nodedata: o,
                                suggestedEmail: t.droppedContact.email,
                                suggestedName: t.droppedContact.name || "",
                                suggestedTitle: t.droppedContact.title || ""
                            }
                        });
                        d.closePromise.then(function(t) {
                            var e = t.value;
                            e && e.promise ? e.promise.success(function(t) {
                                rt(t, a, e.newNode, o)
                            }) : n.hideLoading()
                        })
                    }
                }

                function lt() {
                    M = [], d3.selectAll("g.node").each(function(t) {
                        if (t.id != z.id) {
                            var e = this.getBoundingClientRect();
                            e.d = t, M.push(e)
                        }
                    })
                }
// function is used when 
                function st() {
                    n.showLoading("Updating...4");
                    var t = (z.Name.split(" "), {});
                    t[V.Id] = {}, t[z.Id] = {
                        ReportsToId: V.ReportsToId
                    }, t[z.Id][i.Lifecycle_Status__c] = V[i.Lifecycle_Status__c];
                    var a = V.children || V._children || [];
                    a.map(function(e) {
                        e.Id !== z.Id && (t[e.Id] = {
                            ReportsToId: z.Id
                        })
                    }), d(z, i.Lifecycle_Status__c, V[i.Lifecycle_Status__c], t), t[V.Id][i.Lifecycle_Status__c] = i.READY_TO_DELETE;
                    var r = e.contactsBulkUpdate(t);
                    r.success(function(t) {
                        V = null, z = null, o.success("Updated successfully 831" ), n.hideLoading(), console.log(t)
                    })["catch"](function(t) {
                        console.log(t), o.error("Updated Failed1"), n.hideLoading()
                    })["finally"](function() {})
                }

                function dt(t) {
                    t = t || !1, d3.selectAll(".ghostCircle").attr("class", "ghostCircle"), d3.select(D).attr("class", "node"), d3.select(D).select(".ghostCircle").attr("pointer-events", ""), null !== z && (t ? pt() : null !== V ? ut() : E(w, u))
                }

                function ut() {
                    n.showLoading("Updating");
                    var t = {};
                    t[z.Id] = {
                        ReportsToId: V.Id
                    }, t[z.Id][i.Lifecycle_Status__c] = V[i.Lifecycle_Status__c], d(z, i.Lifecycle_Status__c, V[i.Lifecycle_Status__c], t);
                    var a = e.contactsBulkUpdate(t);
                    a.success(function(t) {
                        o.success("Updated successfully 849"), n.hideLoading(), V = null, z = null
                    })["catch"](function(t) {
                        o.error("Updated Failed2"), n.hideLoading(), console.log(t)
                    })["finally"](function() {})
                }

                function pt() {
                    n.showLoading("Updating...5");
                    var t = {};
                    t[z.Id] = {
                        ReportsToId: null
                    }, t[z.Id][i.Lifecycle_Status__c] = V[i.Lifecycle_Status__c], t[V.Id] = {
                        ReportsToId: z.Id
                    }, d(z, i.Lifecycle_Status__c, V[i.Lifecycle_Status__c], t);
                    var a = e.contactsBulkUpdate(t);
                    a.success(function(t) {
                        o.success("Updated successfully 865"), n.hideLoading(), V = null, z = null, console.log(t)
                    })["catch"](function(t) {
                        console.log(t), o.error("Updated Failed3"), n.hideLoading()
                    })["finally"](function() {})
                }

                function ht(t, e) {
					
                    var a = r.open({
                        templateUrl: "app/components/popup-properties/popupprop.html",
                        appendClassName: "ngdialog-custom",
                        showClose: !1,
                        controller: "PopupPropertiesController",
                        controllerAs: "propertiesCtrl",
                        width: 620,
                        data: {
                          //  popupType: t,
                          //  nodedata: e
                        }
                    });
                    a.closePromise.then(function(a) {
                        var r = a.value;
                        t === i.ADD_NEW_NODE && r && r.promise ? r.promise.success(function(t) {
                            var e = r.newNode;
                            e.Id = t.id, e.Name = e.first_name + " " + e.last_name,
							e.Title = e.title,
							n.Email = e.email1,
							xt(r.newNodeParent, e), o.success("New contact inserted successfully")
                        })["catch"](function(t) {
                            console.log(t), o.error("New contact insertion fails")
                        })["finally"](function() {
                            n.hideLoading()
                        }) : t === i.UPDATE_NODE && r && r.promise && r.promise.success(function(t) {
                            var n = r.newNode; // nodes that show in the input box when update is success - custom code
                            n.Name = n.first_name + " " + n.last_name,
							n.Title = n.title,
							n.Email = e.email1,
							console.log("updateData :: "), console.log(n), Lt(e, n), o.success("Contact updated successfully")
                        })["catch"](function(t) {
                            console.log(t), o.error("Contact updation fails")
                        })["finally"](function() {
                            n.hideLoading()
                        })
                    })
                }
// custom code - while removing the following function is used
// if top heirarchy is not removed then the condition goes in if 
// if top level contact is removed then condition goes in else condition
                function gt(t) {
                    var a = {};
					var conf = confirm("The contact will be removed from chart, Although it shall not remove the contact from Account. Are you sure you want to continue!");
					if(conf == false){
						return false;
					}
                    n.showLoading("Removing...");
                    if (t.ReportsToId) { alert('if');return false;
                        var r;
                        if ("undefined" != typeof t.children || "undefined" != typeof t._children) {
                            var c = t.children || t._children || [],
                                l = t.parent.Id;
                            c.map(function(t) {
                                a[t.Id] = {
                                    ReportsToId: l
                                }
                            }), a[t.Id] = {
                                ReportsToId: null
                            }, a[t.Id][i.Lifecycle_Status__c] = "", r = e.contactsBulkUpdate(a), r.success(function(t) {
                                o.success("Removed successfully"), console.log(t)
                            })["catch"](function(t) {
                                console.log(t), o.error("Remove Failed")
                            })["finally"](function() {
                                n.hideLoading()
                            })
                        } else a[t.Id] = {
                            ReportsToId: null
                        }, a[t.Id][i.Lifecycle_Status__c] = "", r = e.contactsBulkUpdate(a), r.success(function(t) {
                            o.success("Removed successfully"), console.log(t)
                        })["catch"](function(t) { 
                            console.log(t), o.error("Removal Failed")
                        })["finally"](function() {
                            n.hideLoading()
                        })
                    } else if (!t.ReportsToId && ("undefined" != typeof t.children || "undefined" != typeof t._children))
                        if (t[i.Lifecycle_Status__c] === i.PRIMARY) {
							a = "x.php";
							
							/* $http.post(a, t).then(function successCallback(response) {
								alert("yuhu");
							}); */
							console.log(t);
							// when top level contact is removed
							//alert('else if');return false;
                           /*  var s = {
                                first_name: "Unknown",
                                last_name: "CXO",
                                title: "CXO",
                                reports_to_id: "",
                                account_id: t.AccountId,
                                Email: "unknown@email.com"								
                            };
                            s[i.Lifecycle_Status__c] = t[i.Lifecycle_Status__c], s[i.vspachart_designation__c] = "", s[i.vspachart_alignment__c] = i.NEUTRAL;
                            var d = (new Date).getTime(),
                                u = t.Email.split("@")[1];
                            s.Email = s.first_name.toLowerCase() + s.last_name.toLowerCase() + d + "@" + u;
                            var p = e.insertNewNode(s); */
                           // p.success(function(r) {
                                /* console.log(r), s.Id = r.id, s.Name = s.first_name + " " + s.last_name, "undefined" != typeof t.children ? (s.children = t.children, t.children = []) : (s._children = t._children, delete t._children); */
                                var c = s.children || s._children || [];
                                c.map(function(t) {
                                    a[t.Id] = {
                                        ReportsToId: null
                                    }
                                }), a[t.Id] = {}, a[t.Id][i.Lifecycle_Status__c] = "";
                                var l = e.contactsBulkUpdate(a);
                                l.success(function(t) {
                                    o.success("Removed successfully"), console.log(t)
                                })["catch"](function(t) {
                                    console.log(t), o.error("Remove Failed")
                                })["finally"](function() {
                                    n.hideLoading()
                                })
                            //})
                        } else {
							//alert('else');return false;
                            var h = t.children || t._children || [];
                            h.map(function(t) {
                                a[t.Id] = {
                                    ReportsToId: null
                                }
                            }), a[t.Id] = {
                                ReportsToId: null
                            };
                            var g = e.contactsBulkUpdate(a);
                            g.success(function(t) {
                                o.success("Removed successfully"), console.log(t)
                            })["catch"](function(t) {
                                console.log(t), o.error("Remove Failed")
                            })["finally"](function() {
                                n.hideLoading()
                            })
                        }
                }

                function ft(t) {
                    return t.children ? (t._children = t.children, t.children = null) : t._children && (t.children = t._children, t._children = null), t
                }

                function mt(t) {
                    for (var e = -1, n = 0; n < w.length; n++) y(w[n], t), N && (e = n), N = !1;
                    return e
                }

                function _t(t) {
                    O = !1;
                    d3.event && d3.event.defaultPrevented || (t.children || t._children) && (console.log(w), t = ft(t), E(w, u))
                }

                function vt(t) {
                    function e(t, e) {
                        d3.event.preventDefault(), d3.event.stopPropagation(), O ? r(t, e) : (B = setTimeout(function() {
                            _t(t)
                        }, 200), O = !0)
                    }

                    function n(t, e) {
                        d3.event.preventDefault(), d3.event.stopPropagation(), O ? r(t, e) : (B = setTimeout(function() {
                            o(t)
                        }, 200), O = !0)
                    }

                    function o(t) {
                        O = !1, ht(i.UPDATE_NODE, t)
                    }

                    function r(t, e) {
                      /*   O = !1, clearTimeout(B);
                        var n = a.menu(bt);
                        n(d3.select(e).datum(), 0, e) */
                    }

                    function c(t, e) {
                        return "M" + t.source.x + "," + (t.source.y + Y) + "V" + (t.source.y + Y + H / 2) + "H" + t.target.x + "V" + t.target.y
                    }
                    var l = yt.nodes(g).reverse(),
                        s = yt.links(l),
                        d = St.selectAll("g.node").data(l, function(t) {
                            return t.id || (t.id = ++R)
                        }),
                        p = d.enter().append("g").attr("class", "node").attr("transform", function(t) {
                            return G > t.x && (G = t.x), Q < t.x && (Q = t.x), "translate(" + t.x + "," + t.y + ")"
                        }).on("click", function(t) {
                            e(t, this)
                        }).on("touchstart", function(t) {
                            e(t, this)
                        });
                    p.append("rect").attr("x", -(j / 2)).attr("width", j).attr("height", Y).attr("class", "mainRect").attr("rx", 10).attr("ry", 10).attr("fill", function(t) {
                        var e = "#7c99d6";
                        if (t[i.vspachart_designation__c]) {
                            var n = t[i.vspachart_designation__c];
                            u && n.indexOf(u) > -1 && (e = "#253288")
                        }
                        return e
                    });
                    var _ = p.append("g");
                    _.append("rect").attr("x", -85).attr("y", .11 * Y).attr("width", j / 5).attr("height", .45 * Y).attr("class", "scoreRect").attr("fill", function(t) {
                        var e = "#666565";
                        return 0 === f(t.Contact_Relationships__r) ? e = "#666565" : t[i.Last_Contact_Date__c] && (e = m(new Date(t[i.Last_Contact_Date__c]))), e
                    }).attr("rx", .11 * Y).attr("ry", .11 * Y), _.append("text").attr("x", "-66").attr("y", .32 * Y).attr("dy", ".35em").attr("class", "txtleads").text(function(t) {
                        //return f(t.Contact_Relationships__r) // custom code to show abbrev of first and last name
						return t.first_name.charAt(0) + t.last_name.charAt(0);
                    }), p.append("rect").attr("x", -(j / 2) + 10).attr("y", Y - .31 * Y).attr("width", j - 20).attr("height", .25 * Y).attr("class", "titleRect").attr("fill", function(t) {
                        var e = "#000";
                        if (t[i.vspachart_alignment__c]) {
                            var n = t[i.vspachart_alignment__c].trim();
                            n === i.CHAMPION ? e = "#558235" : n === i.BLOCKER && (e = "#990000")
                        }
                        return e
                    }).attr("rx", 10).attr("ry", 10), p.append("text").attr("x", -(j / 2) + 15).attr("y", 25).attr("dy", ".35em").style("cursor", "pointer").attr("class", "txtName").text(function(t) { 
                        var e = t.first_name ? t.first_name : "-";
                        return e + " " + t.last_name || "?"
                    }).on("click", function(t) {
                        n(t, this.parentNode)
                    }).on("touchstart", function(t) {
                        n(t, this.parentNode)
                    }).call(x, Math.round(.63 * j)), p.append("foreignObject").attr("x", -(j / 2) + 15).attr("y", 15).style("display", "none").attr("width", j - 70).attr("height", 25).append("xhtml:body").html("<input type='value' class='txt-name' style='width:" + (j - 70) + "px;border-radius:5px' name='title' />").on("click", function() {
                        d3.event.stopPropagation()
                    }).on("focusout", function(t) {}), p.append("text").attr("y", Y - 15).style("text-anchor", "middle").attr("dy", ".35em").attr("class", "txttitle").style("fill", "#fff").style("cursor", "pointer").on("click", function(t) {
                        n(t, this.parentNode)
                    }).on("touchstart", function(t) {
                        n(t, this.parentNode)
                    }).append("tspan").text(function(t) {
                        return t.Title || t.Title
                    }).call(h, 18), p.append("foreignObject").attr("x", -(j / 2) + 10).attr("y", Y - 27).attr("width", j - 20).attr("height", 25).style("display", "none").append("xhtml:body").html("<input type='value' class='txt-title-svg' maxlength='50' style='width:" + (j - 20) + "px;border-radius:5px' name='title' />").on("click", function() {
                        d3.event.stopPropagation()
                    }).on("focusout", function(t) {});
                    var v = p.append("g").attr("class", function(t) {
                        return t._children ? "plus-g plus-show" : "plus-g plus-hide"
                    });
                    v.append("image").attr("xlink:href", "custom/vats/vedic_Common/vedicConnection/images/bullet_1.png").attr("x", -8).attr("y", Y).attr("width", "16px").attr("height", "16px"), p.append("rect").attr("x", -(j / 2) - 5).attr("y", -5).attr("width", j + 10).attr("height", Y + 10).attr("class", "ghostCircle").attr("rx", 10).attr("ry", 10).attr("opacity", .2).style("fill", "red").attr("pointer-events", "mouseover");
                    var y = d.transition().duration(X).attr("transform", function(t) {
                        return "translate(" + t.x + "," + t.y + ")"
                    });
                    y.select("text").style("fill-opacity", 1);
                    var C = (d.exit().remove(), St.selectAll("path.link").data(s, function(t) {
                        return t.target.id
                    }));
                    St.append("svg:defs").selectAll("marker").data(["end"]).enter().append("svg:marker").attr("id", String).attr("viewBox", "0 -5 10 10").attr("refX", 10).attr("markerWidth", 6).attr("markerHeight", 6).attr("orient", "auto").attr("fill", "#7c99d6").append("svg:path").attr("d", "M0,-5L10,0L0,5"), C.enter().insert("path", "g").attr("class", "link").attr("x", j).attr("y", Y).attr("d", c).attr("marker-end", "url(#end)"), C.transition().duration(X).attr("d", c), C.exit().transition().duration(X).attr("d", c).remove(), l.forEach(function(t) {
                        t.x0 = t.x, t.y0 = t.y
                    }), L(), S()
                }
                var yt = d3.layout.tree().nodeSize([j + q, Y + H]).separation(function(t, e) {
                    return t.parent === e.parent, 1
                });
                p = document.getElementById("svg-cont") ? d3.select("#svg-cont") : d3.select("#tree-struct-cont").append("svg").attr("id", "svg-cont");
                var Ct = d3.behavior.drag().on("dragstart", function(t) {
                    _ = !0, C = yt.nodes(t), M = [], P = "", F = "", V = null, d3.event.sourceEvent.stopPropagation()
                }).on("drag", function(t) {
                    if (_) {
                        D = this;
                        var e = d3.select(this.parentNode).remove();
                        d3.select("#svg-cont").insert(function() {
                            return e.node()
                        }, ":first-child"), ot(t, D)
                    }
                    t.x0 += d3.event.dx, t.y0 += d3.event.dy;
                    var n = d3.select(this);
                    n.attr("transform", "translate(" + t.x0 + "," + t.y0 + ")")
                }).on("dragend", function(t) {
                    D = this;
                    var e, n = [];
                    if (null !== z && (e = this.getBoundingClientRect(), lt(), n = M.filter(function(t) {
                            var n = e.right >= t.right - j && e.right <= t.right + j,
                                a = e.left >= t.left - j && e.left <= t.left + j,
                                o = e.top >= t.top - Y && e.top <= t.top + Y,
                                i = e.bottom >= t.bottom - Y && e.bottom <= t.bottom + Y;
                            return n && a && o && i ? !0 : !1
                        })), 1 === n.length ? V = n[0].d : n.length > 1 && o.info("You have selected more than one 1 contact for drop.Select one contact"), z && z[i.Lifecycle_Status__c] === i.LIFECYCLE_STATUS && (z.children || z._children) && (console.log(V), V && V[i.Lifecycle_Status__c] !== i.LIFECYCLE_STATUS && (V = null)), s(t) || (e && (o.clear(), o.info("Primary tree atleast have one children.")), V = null), V) {
                        var a = {},
                            r = I(z.Name);
                        a.root = T(V), a.unknwon = I(V.Name) && !r, a.root || a.unknwon ? it(a) : dt()
                    } else dt()
                });
                l.isEventExists("suggestedContactDropped") || l.on("suggestedContactDropped", function(t) {
                    console.log(t);
                    var e = {},
                        n = !1;
                    e.root = T(t.d), e.unknwon = I(t.d.Name) && !n, e.root || e.unknwon ? it(e, !0, t) : ct(t, {
                        selected: i.CHILD
                    })
                });
                var bt = [{
                        title: "Relationships",
                        action: function(t, e, n) {
                            var a;
                            if (null !== e.Contact_Relationships__r) {
                                var o, r = e.Contact_Relationships__r.records.length;
                                A && (d3.select("#svg-cont").select("#fo-contextmenu").remove(), d3.select("#svg-cont").select("#line-contextmenu").remove(), d3.select("#svg-cont").select(".mainRectOverlay").attr("class", "mainRect")), A = t;
                                var l = t.getBoundingClientRect();
                                if (console.log("top : " + l.top + "| right : " + l.right + "| left : " + l.left + "| bottom : " + l.bottom + "| scrollX : " + c.scrollX), c.innerWidth - l.right < 200) {
                                    var s = document.getElementById("svg-cont").getBBox().width;
                                    s = c.innerWidth > s ? c.innerWidth + 240 : s + 240, document.getElementById("svg-cont").setAttribute("width", s + "px")
                                }
                                if (c.innerHeight - l.bottom < 120) {
                                    var d = document.getElementById("svg-cont").getBBox().height;
                                    d = c.innerHeight > d ? c.innerHeight + 120 : d + 120, document.getElementById("svg-cont").setAttribute("height", d + "px")
                                }
                                d3.select(t).select(".mainRect").attr("class", "mainRectOverlay"), o = d3.select("#svg-cont").append("foreignObject").attr("id", "fo-contextmenu").attr("x", l.right + document.getElementById("divTreeChart").scrollLeft).attr("y", l.top + c.scrollY - 80).attr("width", 200).attr("height", 30 * r).append("xhtml:body").append("div"), d3.select(t).append("line").attr("id", "line-contextmenu").style("stroke", "#6c8b3b").attr("x1", 80).attr("y1", 20).attr("x2", 150).attr("y2", 20);
                                var u = o.append("table").attr("class", "overlay-menu");
                                for (a = 0; a < e.Contact_Relationships__r.records.length; a++) {
                                    var p = e.Contact_Relationships__r.records[a],
                                        h = p[i.Standard_Score__c] || 0,
                                        g = (p.UserID__r ? p.UserID__r.Name : !1) || (p.Connected_With__r ? p.Connected_With__r.Name : !1) || "";
                                    u.append("tr").append("td").text(g + " - " + Math.round(h))
                                }
                            } else alert("no contacts")
                        }
                    }, {
                        title: "Add Subordinatex",
                        action: function(t, e, n) {
                            ht(i.ADD_NEW_NODE, e)
                        }
                    }, {
                        title: "Properties",
                        action: function(t, e, n) {
                            ht(i.UPDATE_NODE, e)
                        }
                    }, {
                        title: "Remove",
                        action: function(t, e, n) {
                            gt(e)
                        }
                    }],
                    xt = function(t, e) {
                        "undefined" != typeof t.children || "undefined" != typeof t._children ? "undefined" != typeof t.children ? t.children.push(e) : t._children.push(e) : (t.children = [], t.children.push(e)), g = w[mt(t)], E(w, u)
                    },
                    Lt = function(t, e) {
                        t.Name = e.Name, t.first_name = e.first_name, t.last_name = e.last_name, t.Title = e.Title, t[i.vspachart_designation__c] = e[i.vspachart_designation__c], t[i.vspachart_alignment__c] = e[i.vspachart_alignment__c], t.Email = e.Email,
                            E(w, u)
                    },
                    St = p.insert("g");
					
                if (g = b, g.x0 = k / 2, g.y0 = 0, vt(g), b.children || b._children) {
					console.log("if");
                    K += nt, k = v(b, Y, H), W.left = 550, J = c.innerWidth / 2 - j / 2, Math.abs(G) + j / 2 > J && (J = Math.abs(G) + j / 2);
                    var It = Q + Math.abs(G) + j;
                    It > c.innerWidth && (tt = !0, U = It + q), 1 === $ && (document.getElementById("primary-divider") || (K += 10, d3.select("#svg-cont").append("foreignObject").attr("x", 0).attr("y", K).attr("id", "primary-divider").attr("width", screen.width).attr("height", 2).append("xhtml:body").html("<div class='line-break'></div>")), K += 10)
                } else document.getElementById("orphan-divider") || (K += 10, d3.select("#svg-cont").append("foreignObject").attr("x", 0).attr("y", K).attr("id", "orphan-divider").attr("width", screen.width).attr("height", 2).append("xhtml:body").html("<div class='line-break'></div>")), 0 === Z ? (J = 120, K += 10, k = 0, Z++, $ === t.length - 1 && (k = 100)) : (J += j + 10, k = 0, Z++, $ === t.length - 1 && (k = 100)), c.innerWidth - J < 120 && (J = 120, K += 100);
                St.attr("transform", "translate(" + J + "," + K + ")").attr("class", "gtree").attr("id", "tree-" + et++), K += k, (b.children || b._children) && (K += at), p.attr("height", K), G = 0, Q = 0
            }), console.log("screenHeight check == 1"), K < screen.height && (console.log("screenHeight check" + screen.height), K = screen.height, d3.select("#svg-cont").attr("height", K)), tt ? document.getElementById("svg-cont").setAttribute("width", U + "px") : document.getElementById("svg-cont").setAttribute("width", "100%")
        }
        var N, w, A, B, R = 0,
            D = "",
            k = {
                drawVspaTree: E,
                setTabName: b,
                getTabName: _,
                getNodePositions: p
            },
            U = t.element(c),
            O = !1;
        return U.bind("resize", function() {
            console.log("resize"), w && c.innerWidth > 759 && (console.log("tabName : " + _()), E(w, _()))
        }), k
    }
    e.$inject = ["dataService", "loaderService", "d3ContextMenuService", "toastr", "CONSTANTS", "ngDialog", "$window", "busService"], t.module("vspachart").service("buildtreeService", e)
}(angular),
function(t) {
    "use strict";

    function e(t, e, n, a, o, i, r) {
        function c(t, e) {
            t.each(function() {
                var t = d3.select(this),
                    n = (t.node().getComputedTextLength(), t.text()),
                    a = n;
                a = a.length > e ? a.substr(0, e - 1) + "..." : a, t.text(a)
            })
        }

        function l(t) {
            var e = 0;
            return t.children && t.children.forEach(function(t) {
                var n = l(t);
                n > e && (e = n)
            }), 1 + e
        }

        function s() {
            return x
        }

        function d(t, e, n) {
            var a = l(t);
            return a * e + (a - 1) * n
        }

        function u(t, e) {
            t.Id === e.Id && (y = !0), t.children && t.children.forEach(function(t) {
                u(t, e)
            })
        }

        function p(t) {
            x = t
        }

        function h(t, e) {
            t.each(function() {
                for (var t, n = d3.select(this), a = n.text().split(/\s+/).reverse(), o = [], i = 0, r = 1.1, c = n.attr("x"), l = n.attr("y"), s = 0, d = n.text(null).append("tspan").attr("x", c).attr("y", l).attr("dy", s + "em"); t = a.pop();) o.push(t), d.text(o.join(" ")), d.node().getComputedTextLength() > e && (o.pop(), d.text(o.join(" ")), o = [t], d = n.append("tspan").attr("x", c).attr("y", l).attr("dy", ++i * r + s + "em").text(t))
            })
        }

        function g() {
            for (var n = document.getElementsByClassName("txt-name"), i = 0; i < n.length; i++) n[i].className.indexOf(o.BLURRED_CLASS) < 0 && (n[i].className += " " + o.BLURRED_CLASS, n[i].addEventListener("blur", function(n) {
                var o = d3.select(this.parentNode.parentNode.parentNode).datum(),
                    i = d3.select(this.parentNode.parentNode),
                    r = this.value.trim(),
                    c = r.split(" ");
                if (r && r.length > 0 && r !== o.Name && c.length >= 2) {
                    o.Name = r, d3.select(this.parentNode.parentNode.previousSibling).text(r);
                    var l = {
                        FirstName: c[0],
                        LastName: c[1]
                    };
                    e.showLoading("Updating...6");
                    var s = t.updateJsonData(o.Id, l);
                    s.success(function(t) {
                        a.success("Name updated successfully")
                    })["catch"](function(t) {
                        a.error("Name updation failed.Please report issue")
                    })["finally"](function() {
                        e.hideLoading()
                    })
                } else(!r || 0 === r.length || c.length < 2) && a.error("Please provide valid name");
                i.style("display", "none")
            }, !0))
        }

        function f() {
            for (var n = document.getElementsByClassName("txt-title-svg"), i = 0; i < n.length; i++) n[i].className.indexOf(o.BLURRED_CLASS) < 0 && (n[i].className += " " + o.BLURRED_CLASS, n[i].addEventListener("blur", function(n) {
                var o = d3.select(this.parentNode.parentNode.parentNode).datum(),
                    i = d3.select(this.parentNode.parentNode),
                    r = this.value.trim();
                if (0 === r.length && a.error("Please enter valid title"), r && r.length > 0 && r !== o.Title) {
                    o.Title = r, d3.select(this.parentNode.parentNode.previousSibling).text(r);
                    var c = (name.split(" "), {
                        Title: r
                    });
                    e.showLoading("Updating...7");
                    var l = t.updateJsonData(o.Id, c);
                    l.success(function(t) {
                        a.success("Title updated successfully")
                    })["catch"](function(t) {
                        a.error("Title updation failed.Please report issue")
                    })["finally"](function() {
                        e.hideLoading()
                    })
                }
                i.style("display", "none")
            }, !0))
        }

        function m(t) {
            return t.toLowerCase().indexOf(o.UNKNOWN) > -1 ? !0 : !1
        }

        function _(t) {
            return !t.ReportsToId && t.children ? !0 : !1
        }

        function v(l, s) {
            C = l, console.log("drawVspaTree");
            var p, x, L, S, I, T, E, N, w, A, B = 180,
                R = 80,
                D = {
                    top: 20,
                    right: 0,
                    bottom: 20,
                    left: 550
                },
                k = 40,
                U = 20,
                O = null,
                M = null,
                P = 0,
                F = 120,
                $ = 0,
                j = 0,
                Y = 0,
                W = 0,
                H = !1,
                q = 0,
                V = 20,
                z = 20;
            document.getElementById("svg-cont") && d3.select("#svg-cont").remove(), l.forEach(function(X, J) {
                function K(t, e) {
                    if (M = t, d3.select(e).select(".ghostCircle").attr("pointer-events", "none"), d3.selectAll(".ghostCircle").attr("class", "ghostCircle show"), d3.select(e).attr("class", "node activeDrag"), Ct.selectAll("g.node").sort(function(t, e) {
                            return t.id != M.id ? 1 : -1
                        }), S.length > 1) {
                        var n = ht.links(S);
                        Ct.selectAll("path.link").data(n, function(t) {
                            return t.target.id
                        }).remove(), Ct.selectAll("g.node").data(S, function(t) {
                            return t.id
                        }).filter(function(t, e) {
                            return t.id == M.id ? !1 : !0
                        }).remove()
                    }
                    if (M.parent) {
                        ht.links(ht.nodes(M.parent));
                        Ct.selectAll("path.link").filter(function(t, e) {
                            return t.target.id == M.id ? !0 : !1
                        }).remove()
                    }
                    L = null
                }

                function Z(t) {
                    var e = i.open({
                        id: "arrowPop",
                        templateUrl: "app/components/popup-arrows/arrows.html",
                        appendClassName: "ngdialog-arrows",
                        showClose: !1,
                        controller: "ArrowsController",
                        controllerAs: "vm",
                        width: 80,
                        data: {
                            data: t
                        }
                    });
                    e.closePromise.then(function(t) {
                        var e = t.value;
                        e.selected === o.PARENT ? Q() : e.selected === o.REPLACE ? tt() : e.selected === o.CHILD ? nt() : (O = null, at())
                    })
                }

                function G() {
                    N = [], d3.selectAll("g.node").each(function(t) {
                        if (t.id != M.id) {
                            var e = this.getBoundingClientRect();
                            e.d = t, N.push(e)
                        }
                    })
                }

                function Q() {
                    var t, e = dt(O);
                    M.parent ? (t = M.parent.children.indexOf(M), t > -1 && M.parent.children.splice(t, 1)) : (t = C.indexOf(M), t > -1 && C.splice(t, 1)), "undefined" != typeof M.children || "undefined" != typeof M._children ? "undefined" != typeof M.children ? M.children.push(O) : M._children.push(O) : (M.children = [], M.children.push(O)), C[e] = M, at(!0)
                }

                function tt() {
                    e.showLoading("Updating...8"), O.Name = M.Name, O.Title = M.Title, O.VspaMetric__vspachart_designation__c = M.VspaMetric__vspachart_designation__c, O.VspaMetric__vspachart_alignment__c = M.VspaMetric__vspachart_alignment__c, O.Email = M.Email;
                    var n = O.Name.split(" "),
                        i = !1;
                    O.VspaMetric__Lifecycle_Status__c === o.LIFECYCLE_STATUS && M.VspaMetric__Lifecycle_Status__c !== o.LIFECYCLE_STATUS && (i = !0);
                    var r = {};
                    r[M.Id] = {
                        VspaMetric__Lifecycle_Status__c: o.READY_TO_DELETE
                    }, r[O.Id] = {
                        FirstName: n[0],
                        LastName: n[1],
                        Title: O.Title,
                        VspaMetric__vspachart_designation__c: O.VspaMetric__vspachart_designation__c,
                        VspaMetric__vspachart_alignment__c: O.VspaMetric__vspachart_alignment__c,
                        Email: O.Email
                    };
                    var c = M.children || M._children || [];
                    c.map(function(t) {
                        r[t.Id] = {
                            ReportsToId: O.Id
                        }, i && (r[t.Id].VspaMetric__Lifecycle_Status__c = o.LIFECYCLE_STATUS)
                    });
                    var l = t.contactsBulkUpdate(r);
                    l.success(function(t) {
                        et(c), O = null, at(), M = null, a.success("Updated successfully 1414"), e.hideLoading(), console.log(t)
                    })["catch"](function(t) {
                        console.log(t), a.error("Updated Failed4"), e.hideLoading()
                    })["finally"](function() {})
                }

                function et(t) {
                    var e;
                    M.parent ? (e = M.parent.children.indexOf(M), e > -1 && M.parent.children.splice(e, 1)) : (e = C.indexOf(M), e > -1 && C.splice(e, 1)), "undefined" != typeof O.children || "undefined" != typeof O._children ? "undefined" != typeof O.children ? O.children = O.children.concat(t) : O._children = O._children.concat(t) : (O.children = [], O.children = O.children.concat(t))
                }

                function nt() {
                    var t;
                    M.parent && M.parent.children && M.ReportsToId ? (t = M.parent.children.indexOf(M), t > -1 && M.parent.children.splice(t, 1)) : (t = C.indexOf(M), t > -1 && C.splice(t, 1)), "undefined" != typeof O.children || "undefined" != typeof O._children ? "undefined" != typeof O.children ? O.children.push(M) : O._children.push(M) : (O.children = [], O.children.push(M)), lt(O), at()
                }

                function at(t) {
                    t = t || !1, d3.selectAll(".ghostCircle").attr("class", "ghostCircle"), d3.select(I).attr("class", "node"), d3.select(I).select(".ghostCircle").attr("pointer-events", ""), null !== M && (t ? it() : null !== O ? ot() : v(C, s))
                }

                function ot() {
                    e.showLoading("Updating");
                    var n = {},
                        i = !1;
                    if (O.VspaMetric__Lifecycle_Status__c === o.LIFECYCLE_STATUS && (i = !0), n[M.Id] = {
                            ReportsToId: O.Id
                        }, i) {
                        n[M.Id].VspaMetric__Lifecycle_Status__c = o.LIFECYCLE_STATUS;
                        var r = M.children || M._children || [];
                        r.map(function(t) {
                            n[t.Id] = {}, n[t.Id].VspaMetric__Lifecycle_Status__c = o.LIFECYCLE_STATUS, t.VspaMetric__Lifecycle_Status__c = O.VspaMetric__Lifecycle_Status__c
                        })
                    }
                    var c = t.contactsBulkUpdate(n);
                    c.success(function(t) {
                        M.ReportsToId = O.Id, M.VspaMetric__Lifecycle_Status__c = O.VspaMetric__Lifecycle_Status__c, v(C, s), a.success("Updated successfully 1449"), e.hideLoading(), O = null, M = null
                    })["catch"](function(t) {
                        a.success("Updated Failed5"), e.hideLoading(), console.log(t)
                    })["finally"](function() {})
                }

                function it() {
                    e.showLoading("Updating...9");
                    var n = {},
                        i = !1;
                    if (O.VspaMetric__Lifecycle_Status__c === o.LIFECYCLE_STATUS && M.VspaMetric__Lifecycle_Status__c !== o.LIFECYCLE_STATUS && (i = !0), n[M.Id] = {
                            ReportsToId: null
                        }, n[O.Id] = {
                            ReportsToId: M.Id
                        }, i) {
                        n[M.Id].VspaMetric__Lifecycle_Status__c = o.LIFECYCLE_STATUS;
                        var r = M.children || M._children || [];
                        r.map(function(t) {
                            n[t.Id] = {}, n[t.Id].VspaMetric__Lifecycle_Status__c = o.LIFECYCLE_STATUS, t.VspaMetric__Lifecycle_Status__c = O.VspaMetric__Lifecycle_Status__c
                        })
                    }
                    var c = t.contactsBulkUpdate(n);
                    c.success(function(t) {
                        M.ReportsToId = null, O.ReportsToId = M.Id, M.VspaMetric__Lifecycle_Status__c = O.VspaMetric__Lifecycle_Status__c, v(C, s), a.success("Updated successfully 1472"), e.hideLoading(), O = null, M = null, console.log(t)
                    })["catch"](function(t) {
                        console.log(t), a.error("Updated Failed6"), e.hideLoading()
                    })["finally"](function() {})
                }

                function rt(t, n) {
                    var r = i.open({
                        templateUrl: "app/components/popup-properties/popupprop.html",
                        appendClassName: "ngdialog-custom",
                        showClose: !1,
                        controller: "PopupPropertiesController",
                        controllerAs: "propertiesCtrl",
                        width: 620,
                        data: {
                            popupType: t,
                            nodedata: n
                        }
                    });
                    r.closePromise.then(function(i) {
                        var r = i.value;
                        t === o.ADD_NEW_NODE && r && r.promise ? r.promise.success(function(t) {
                            var e = r.newNode;
                            e.Id = t.id, e.Name = e.FirstName + " " + e.LastName, mt(r.newNodeParent, e), a.success("New contact inserted successfully")
                        })["catch"](function(t) {
                            console.log(t), a.success("New contact insertion fails")
                        })["finally"](function() {
                            e.hideLoading()
                        }) : t === o.UPDATE_NODE && r && r.promise && r.promise.success(function(t) {
                            var e = r.newNode;
                            e.Name = e.FirstName + " " + e.LastName, _t(n, e), a.success("Contact updated successfully2")
                        })["catch"](function(t) {
                            console.log(t), a.error("Contact updation fails")
                        })["finally"](function() {
                            e.hideLoading()
                        })
                    })
                }

                function ct(n) {
                    var i = {};
                    e.showLoading();
                    var r = -1,
                        c = [];
                    if (n.ReportsToId)
                        if ("undefined" != typeof n.children || "undefined" != typeof n._children) {
                            var l = n.children || n._children || [];
                            "undefined" != typeof n.children ? (n.parent.children = n.parent.children.concat(n.children), n.children = []) : (n.parent.children = n.parent.children.concat(n._children), delete n._children), r = n.parent.children.indexOf(n);
                            var d = n.parent.Id;
                            r > -1 && (c = n.parent.children.splice(r, 1), c[0].ReportsToId = null, c[0].VspaMetric__Lifecycle_Status__c = "", C.push(c[0])), l.map(function(t) {
                                i[t.Id] = {
                                    ReportsToId: d
                                }
                            }), i[n.Id] = {
                                ReportsToId: null,
                                VspaMetric__Lifecycle_Status__c: ""
                            };
                            var u = t.contactsBulkUpdate(i);
                            u.success(function(t) {
                                v(C, s), a.success("Removed successfully"), console.log(t)
                            })["catch"](function(t) {
                                console.log(t), a.error("Remove Failed")
                            })["finally"](function() {
                                e.hideLoading()
                            })
                        } else {
                            r = n.parent.children.indexOf(n), r > -1 && (c = n.parent.children.splice(r, 1), c[0].VspaMetric__Lifecycle_Status__c = "", c[0].ReportsToId = null, C.push(c[0]));
                            var p = {};
                            p = {
                                ReportsToId: null,
                                VspaMetric__Lifecycle_Status__c: ""
                            };
                            var h = t.updateJsonData(n.Id, p);
                            h.success(function(t) {
                                v(C, s), a.success("Removed successfully")
                            })["catch"](function(t) {
                                a.error("Removal failed.Please report issue")
                            })["finally"](function() {
                                e.hideLoading()
                            })
                        }
                    else if (!n.ReportsToId && ("undefined" != typeof n.children || "undefined" != typeof n._children)) {
                        var g = {
                                FirstName: "Unknown",
                                LastName: "CXO",
                                Title: "CXO",
                                VspaMetric__vspachart_designation__c: "",
                                VspaMetric__vspachart_alignment__c: o.NEUTRAL,
                                VspaMetric__Lifecycle_Status__c: n.VspaMetric__Lifecycle_Status__c,
                                ReportsToId: "",
                                AccountId: n.AccountId+">>>3",
                                Email: ""
                            },
                            f = (new Date).getTime(),
                            m = n.Email.split("@")[1];
                        g.Email = g.FirstName.toLowerCase() + g.LastName.toLowerCase() + f + "@" + m, g.VspaMetric__Lifecycle_Status__c === o.LIFECYCLE_STATUS && (g.VspaMetric__Lifecycle_Status__c = o.LIFECYCLE_STATUS);
                        var _ = t.insertNewNode(g);
                        _.success(function(o) {
                            console.log(o), g.Id = o.id, g.Name = g.FirstName + " " + g.LastName, "undefined" != typeof n.children ? (g.children = n.children, n.children = []) : (g._children = n._children, delete n._children), r = C.indexOf(n), console.log("Index : " + r), r > -1 && (c = C.splice(r, 1), C.splice(r, 0, g), n.VspaMetric__Lifecycle_Status__c = "", C.push(n));
                            var l = g.children || g._children || [];
                            l.map(function(t) {
                                i[t.Id] = {
                                    ReportsToId: g.Id
                                }
                            }), i[n.Id] = {
                                VspaMetric__Lifecycle_Status__c: ""
                            };
                            var d = t.contactsBulkUpdate(i);
                            d.success(function(t) {
                                v(C, s), a.success("Removed successfully"), console.log(t)
                            })["catch"](function(t) {
                                console.log(t), a.error("Remove Failed")
                            })["finally"](function() {
                                e.hideLoading()
                            })
                        })
                    }
                }

                function lt(t) {
                    t._children && (t.children = t._children, t.children.forEach(lt), t._children = null)
                }

                function st(t) {
                    return t.children ? (t._children = t.children, t.children = null) : t._children && (t.children = t._children, t._children = null), t
                }

                function dt(t) {
                    for (var e = -1, n = 0; n < C.length; n++) u(C[n], t), y && (e = n), y = !1;
                    return e
                }

                function ut(t) {
                    d3.event.defaultPrevented || (t.children || t._children) && (console.log(C), t = st(t), v(C, s))
                }

                function pt(t) {
                    function e(t) {
                        d3.event.stopPropagation(), d3.select(this.nextSibling).style("display", "block");
                        var e = d3.select(this.nextSibling).select("input")[0][0];
                        e.value = t.Name, e.focus()
                    }

                    function a(t) {
                        d3.event.stopPropagation(), d3.select(this.nextSibling).style("display", "block");
                        var e = d3.select(this.nextSibling).select("input")[0][0];
                        e.value = t.Title, e.focus()
                    }

                    function i(t, e) {
                        return "M" + t.source.x + "," + (t.source.y + R) + "V" + (t.source.y + R + k / 2) + "H" + t.target.x + "V" + t.target.y
                    }
                    var r = ht.nodes(x).reverse(),
                        l = ht.links(r),
                        d = Ct.selectAll("g.node").data(r, function(t) {
                            return t.id || (t.id = ++b)
                        }),
                        u = 0,
                        p = d.enter().append("g").attr("class", "node").attr("transform", function(t) {
                            return Y > t.x && (Y = t.x), W < t.x && (W = t.x), "translate(" + t.x + "," + t.y + ")"
                        }).on("click", ut).on("touchstart", ut).on("contextmenu", n.menu(ft)).on("touchstart", function(t) {
                            if (d3.event.timeStamp - u < 500) {
                                var e = n.menu(ft);
                                e(d3.select(this).datum()), d3.event.preventDefault()
                            }
                            u = d3.event.timeStamp
                        }).on("touchend", function(t) {
                            yt(t)
                        }).call(gt);
                    p.append("rect").attr("x", -(B / 2)).attr("width", B).attr("height", R).attr("class", "mainRect").attr("rx", 10).attr("ry", 10).attr("fill", function(t) {
                        var e = "#7c99d6";
                        var e = "#2565ed";
                        if (t.VspaMetric__vspachart_designation__c) {
                            var n = t.VspaMetric__vspachart_designation__c.split(";");
                            s && n.indexOf(s) > -1 && (e = "#253288")
                        }
                        return e
                    });
                    p.append("g");
                    p.append("rect").attr("x", -(B / 2) + 10).attr("y", R - 25).attr("width", B - 20).attr("height", 20).attr("class", "titleRect").attr("fill", function(t) {
                        var e = "#000";
                        if (t.VspaMetric__vspachart_alignment__c) {
                            var n = t.VspaMetric__vspachart_alignment__c.trim();
                            n === o.CHAMPION ? e = "#558235" : n === o.BLOCKER && (e = "#990000")
                        }
                        return e
                    }).attr("rx", 10).attr("ry", 10), p.append("text").attr("x", -(B / 2) + 15).attr("y", 25).attr("dy", ".35em").style("cursor", "pointer").attr("class", "txtName").text(function(t) { 
                        return t.Name || "?"
                    }).on("click", e).on("touchstart", e).call(h, 115), p.append("foreignObject").attr("x", -(B / 2) + 15).attr("y", 15).style("display", "none").attr("width", B - 70).attr("height", 25).append("xhtml:body").html("<input type='value' class='txt-name' style='width:" + (B - 70) + "px;border-radius:5px' name='title' />").on("click", function() {
                        d3.event.stopPropagation()
                    }).on("focusout", function(t) {}), p.append("text").attr("y", R - 15).style("text-anchor", "middle").attr("dy", ".35em").attr("class", "txttitle").style("fill", "#fff").style("cursor", "pointer").on("click", a).on("touchstart", a).append("tspan").text(function(t) {
                        return t.Title || "?"
                    }).call(c, 20), p.append("foreignObject").attr("x", -(B / 2) + 10).attr("y", R - 27).attr("width", B - 20).attr("height", 25).style("display", "none").append("xhtml:body").html("<input type='value' class='txt-title-svg' style='width:" + (B - 20) + "px;border-radius:5px' name='title' />").on("click", function() {
                        d3.event.stopPropagation()
                    }).on("focusout", function(t) {});
                    var m = p.append("g").attr("class", function(t) {
                        return t._children ? "plus-g plus-show" : "plus-g plus-hide"
                    });
                    m.append("image").attr("xlink:href", "../images/bullet_1.png").attr("x", -8).attr("y", R).attr("width", "16px").attr("height", "16px"), p.append("rect").attr("x", -(B / 2) - 5).attr("y", -5).attr("width", B + 10).attr("height", R + 10).attr("class", "ghostCircle").attr("rx", 10).attr("ry", 10).attr("opacity", .2).style("fill", "red").attr("pointer-events", "mouseover").on("mouseover", vt).on("mouseout", yt);
                    var _ = d.transition().duration(P).attr("transform", function(t) {
                        return "translate(" + t.x + "," + t.y + ")"
                    });
                    _.select("text").style("fill-opacity", 1);
                    var v = (d.exit().remove(), Ct.selectAll("path.link").data(l, function(t) {
                        return t.target.id
                    }));
                    Ct.append("svg:defs").selectAll("marker").data(["end"]).enter().append("svg:marker").attr("id", String).attr("viewBox", "0 -5 10 10").attr("refX", 10).attr("markerWidth", 6).attr("markerHeight", 6).attr("orient", "auto").attr("fill", "#7c99d6").append("svg:path").attr("d", "M0,-5L10,0L0,5"), v.enter().insert("path", "g").attr("class", "link").attr("x", B).attr("y", R).attr("d", i).attr("marker-end", "url(#end)"), v.transition().duration(P).attr("d", i), v.exit().transition().duration(P).attr("d", i).remove(), r.forEach(function(t) {
                        t.x0 = t.x, t.y0 = t.y
                    }), g(), f()
                }
                var ht = d3.layout.tree().nodeSize([B + U, R + k]).separation(function(t, e) {
                    return t.parent === e.parent, 1
                });
                p = document.getElementById("svg-cont") ? d3.select("#svg-cont") : d3.select("#tree-struct-cont").append("svg").attr("id", "svg-cont");
                var gt = d3.behavior.drag().on("dragstart", function(t) {
                        L = !0, S = ht.nodes(t), N = [], w = "", A = "", O = null, d3.event.sourceEvent.stopPropagation()
                    }).on("drag", function(t) {
                        if (L) {
                            I = this;
                            var e = d3.select(this.parentNode).remove();
                            d3.select("#svg-cont").insert(function() {
                                return e.node()
                            }, ":first-child"), K(t, I)
                        }
                        t.x0 += d3.event.dx, t.y0 += d3.event.dy;
                        var n = d3.select(this);
                        n.attr("transform", "translate(" + t.x0 + "," + t.y0 + ")")
                    }).on("dragend", function(t) {
                        I = this;
                        var e, n = [];
                        if (null !== M && (e = this.getBoundingClientRect(), G(), n = N.filter(function(t) {
                                var n = e.right >= t.right - B && e.right <= t.right + B,
                                    a = e.left >= t.left - B && e.left <= t.left + B,
                                    o = e.top >= t.top - R && e.top <= t.top + R,
                                    i = e.bottom >= t.bottom - R && e.bottom <= t.bottom + R;
                                return n && a && o && i ? !0 : !1
                            })), 1 === n.length ? O = n[0].d : n.length > 1 && a.info("You have selected more than 2 one contact for drop.Select one contact"), M && M.VspaMetric__Lifecycle_Status__c === o.LIFECYCLE_STATUS && (M.children || M._children) && O && O.VspaMetric__Lifecycle_Status__c !== o.LIFECYCLE_STATUS && (O = null), O) {
                            var i = {},
                                r = m(M.Name);
                            i.root = _(O), i.unknwon = m(O.Name) && !r, i.root || i.unknwon ? Z(i) : nt()
                        } else at()
                    }),
                    ft = [{
                        title: "Relationships",
                        action: function(t, e, n) {
                            if (null !== e.Contact_Relationships__r) {
                                var a, o = e.Contact_Relationships__r.records.length;
                                d3.select(t).select(".mainRect").attr("class", "mainRectOverlay"), a = d3.select(t).append("foreignObject").attr("id", "fo-contextmenu").attr("x", 150).attr("y", 0).attr("width", 200).attr("height", 30 * o).append("xhtml:body").append("div"), d3.select(t).append("line").attr("id", "line-contextmenu").style("stroke", "#6c8b3b").attr("x1", 80).attr("y1", 20).attr("x2", 150).attr("y2", 20);
                                for (var i = a.append("table").attr("class", "overlay-menu"), n = 0; n < e.Contact_Relationships__r.records.length; n++) {
                                    var r = e.Contact_Relationships__r.records[n],
                                        c = r.Standard_Score__c || 0;
                                    i.append("tr").append("td").text(r.UserID__r.Name + " - " + c)
                                }
                            } else alert("no contacts")
                        }
                    }, {
                        title: "Add Subordinates",
                        action: function(t, e, n) {
                            rt(o.ADD_NEW_NODE, e)
                        }
                    }, {
                        title: "Properties",
                        action: function(t, e, n) {
                            rt(o.UPDATE_NODE, e)
                        }
                    }, {
                        title: "Remove",
                        action: function(t, e, n) {
                            ct(e)
                        }
                    }],
                    mt = function(t, e) {
                        "undefined" != typeof t.children || "undefined" != typeof t._children ? "undefined" != typeof t.children ? t.children.push(e) : t._children.push(e) : (t.children = [], t.children.push(e)), x = C[dt(t)], v(C, s)
                    },
                    _t = function(t, e) {
                        t.Name = e.Name, t.Title = e.Title, t.VspaMetric__vspachart_designation__c = e.VspaMetric__vspachart_designation__c, t.VspaMetric__vspachart_alignment__c = e.VspaMetric__vspachart_alignment__c, t.Email = e.Email, v(C, s)
                    },
                    vt = function(t) {},
                    yt = function(t) {},
                    Ct = p.insert("g");
                if (x = X, x.x0 = T / 2, x.y0 = 0, pt(x), X.children || X._children) {
                    $ += V, T = d(X, R, k), D.left = 550, F = screen.width / 2 - B / 2, Math.abs(Y) + B / 2 > F && (F = Math.abs(Y) + B / 2);
                    var bt = W + Math.abs(Y) + B;
                    bt > screen.width && (H = !0, E = bt + U), 1 === J && (document.getElementById("primary-divider") || ($ += 10, d3.select("#svg-cont").append("foreignObject").attr("x", 0).attr("y", $).attr("id", "primary-divider").attr("width", screen.width).attr("height", 2).append("xhtml:body").html("<div class='line-break'></div>")), $ += 10)
                } else document.getElementById("orphan-divider") || ($ += 10, d3.select("#svg-cont").append("foreignObject").attr("x", 0).attr("y", $).attr("id", "orphan-divider").attr("width", screen.width).attr("height", 2).append("xhtml:body").html("<div class='line-break'></div>")), 0 === j ? (F = 120, $ += 10, T = 0, j++, J === l.length - 1 && (T = 100)) : (F += B + 10, T = 0, j++, J === l.length - 1 && (T = 100)), r.innerWidth - F < 120 && (F = 120, $ += 100);
                Ct.attr("transform", "translate(" + F + "," + $ + ")").attr("class", "gtree").attr("id", "tree-" + q++), $ += T, X._children && ($ += z), p.attr("height", $), Y = 0, W = 0
            }), $ < screen.height && ($ = screen.height), H ? document.getElementById("svg-cont").setAttribute("width", E + "px") : document.getElementById("svg-cont").setAttribute("width", "100%")
        }
        var y, C, b = 0,
            x = "",
            L = {
                drawVspaTree: v,
                setTabName: p,
                getTabName: s
            };
        return L
    }
    e.$inject = ["dataService", "loaderService", "d3ContextMenuService", "toastr", "CONSTANTS", "ngDialog", "$window"], t.module("vspachart").service("_buildtreeService", e)
}(angular),
function(t) {
    "use strict";

    function e(t, e) {
        var n = e.search();
        t.fetchJsonData(n.aId)
    }
    e.$inject = ["dataService", "$location"], t.module("vspachart").run(e)
}(angular),
function(t) {
    "use strict";
// configuring urls to redirect
    function e(t, e) {
        t.when("/welcome", {
            templateUrl: "app/welcome-wizard/welcome.html",
            controller: "WelcomeController",
            controllerAs: "wc"
        }).when("/", {
            templateUrl: "app/tree-chart/treechart.html",
            controller: "",
            controllerAs: ""
        }).otherwise({
            redirectTo: "/"	// redirect to base url domain hiding the entire parameters of url
        }), e.html5Mode({
            enabled: false,
            requireBase: !1
        })
    }
    e.$inject = ["$routeProvider", "$locationProvider"], t.module("vspachart").config(e)
}(angular),
function(t) {
    "use strict";

    function e(t) {
        t.config({
            domains: {
                localhost: ["localhost", "192.168.43.2", "192.168.1.101", "192.168.1.18", "192.168.1.4"],
                development: ["dev-vspachart.herokuapp.com", "dev.vspachart.today"],
                egnyteVantiq: ["egnyte.vspachart.today", "vantiq.vspachart.today"],
                demo: ["demo.vspachart.today"]
            },
            vars: {
                localhost: {
                    serviceUrl: "http://localhost:8081/api/v1/",
                    redirectUri: "http://localhost:3000/",
                    clientId: "3MVG9ahGHqp.k2_zRRx3TgEyjxbv3ygSbC.TUU3X3jkXhvZJ2JiW.SeYHIXt_8Yk5WDbv.wjJbvWVTTCsrfif",
                    redirectUriLinkedIn: "http://localhost:3000/social",
                    clientIdLinkedIn: "78szqf0y2dl9i3",
                    msn_client_id: "e5e3f799-83da-4614-bbde-d066475d390c",
                    msn_client_secret: "3S7Osan4HeJdkgK8q08d0Wd",
                    msn_redirect_uri: "http://localhost:3000/email_setup"
                },
                development: {
                    serviceUrl: "https://devservice.boltconnections.today/api/v1/",
                    redirectUri: "https://dev.vspachart.today",
                    clientId: "3MVG9zZht._ZaMunve7E7ho.1XvCo7QFYVrIt3LCohyvw0g1WmHgeHqqRy11tswYYC8uU0oHcYvHkPl6XssUn",
                    redirectUriLinkedIn: "https://dev.vspachart.today/social",
                    clientIdLinkedIn: "78szqf0y2dl9i3",
                    msn_client_id: "e5e3f799-83da-4614-bbde-d066475d390c",
                    msn_client_secret: "3S7Osan4HeJdkgK8q08d0Wd",
                    msn_redirect_uri: "http://dev.vspachart.today/email_setup"
                },
                egnyteVantiq: {
                    serviceUrl: "https://shielded-refuge-28055.herokuapp.com/"
                },
                demo: {
                    serviceUrl: "https://sleepy-badlands-35075.herokuapp.com/"
                }
            }
        }), t.check()
    }
    e.$inject = ["envServiceProvider"], t.module("vspachart").config(e)
}(angular),
function(t) {
    "use strict";
    t.module("vspachart").constant("CONSTANTS", {
        LIFECYCLE_STATUS: "Primary",
        ADD_NEW_NODE: "AddNewNode",
        UPDATE_NODE: "UpdateNode",
        ECONOMIC: "Economic",
        TECHNICAL: "Technical",
        COMPETITIVE: "Competitive",
        CHAMPION: "Champion",
        BLOCKER: "Blocker",
        NEUTRAL: "Neutral",
        BLURRED_CLASS: "blurred",
        UNKNOWN: "unknown",
        PARENT: "Parent",
        REPLACE: "Replace",
        CHILD: "Child",
        READY_TO_DELETE: "Ready to Delete",
        Lifecycle_Status__c: "Lifecycle_Status__c",
        Last_Contact_Date__c: "Last_Contact_Date__c",
        vspachart_designation__c: "vspachart_designation__c",
        vspachart_alignment__c: "vspachart_alignment__c",
        Standard_Score__c: "Standard_Score__c",
        Start_Date__c: "Start_Date__c",
        Status__c: "Status__c"
    })
}(angular), angular.module("vspachart").run(["$templateCache", function(t) {
console.log("Final Test<><><><><"+t);
   // t.put("app/tree-chart/header.html", '<div class=main-header ng-controller="TreeChartController as treechart"><div class=logo-cont><img alt=logo class="logo img-responsive" src=custom/modules/vedic_common/vedicConnection/images/vedic_logo.png></div>{{treechart.accountName}}</div>'), 
	t.put("app/tree-chart/treechart.dir.html", "<div id=graph class=container-fluid><div class=row><div id=tree-struct-cont class=col-lg-12></div></div></div>"), 
	t.put("app/tree-chart/treechart.html", '<div ng-controller="TreeChartController as treechart"><div ng-if=treechart.isError><h3>Something went wrong. Try refreshing or try after sometime.<h3></h3></h3></div><div id=divTreeChart class=scroll ng-class=treechart.widthAdjustClass dnd-list dnd-dragover=""><!--<overlay-menu items="treechart.suggestList" on-select="print(item)"></overlay-menu>--><tree-chart data=treechart.data ng-style="{width: treechart.elmWidth + \'px\'}"></tree-chart></div></div></div>'), 
//	t.put("app/welcome-wizard/welcome.html", '<div class=row><nav class="navbar navbar-inverse"><div class=container-fluid><div class=navbar-header><b><span>Demo</span></b></div><div class="navbar-form navbar-right margin-top3"><!--<div class="col-md-3">--><select class=form-control ng-model=state ng-options="f for f in states" ng-change=getCity()><option></option></select><!--</div>--><!--<div class="col-md-3">--><select class=form-control ng-model=city ng-options="f for f in citiesInState" ng-change=getData()><option></option></select><!--</div>--></div></div></nav><div class="col-md-10 col-md-offset-1"><div class="login-panel panel panel-default margin-100"><div class=panel-heading><strong>Chart</strong></div><div class=panel-body><canvas id=line class="chart chart-line" chart-data=data chart-labels=labels chart-series=series chart-options=options chart-dataset-override=datasetOverride chart-click=onClick chart-colors=colors></canvas></div></div></div></div>'),
	//t.put("app/components/popup-arrows/arrows.html", '<div class=row ng-controller="ArrowsController as vm"><div class=row><a ng-if=vm.root class=customalert_button_confirm ng-click=vm.parent()><img alt=Up class=img-responsive src=custom/modules/vedic_common/vedicConnection/images/arrow-up.png></a></div><div class="row btn-replace"><a ng-if=vm.unknown href=# ng-click=vm.replace()><img alt=Up class=img-responsive src=custom/modules/vedic_common/vedicConnection/images/Replace_noBG.png></a></div><div class=row><a class=customalert_button_cancel ng-click=vm.child()><img alt=Down class=img-responsive src=custom/modules/vedic_common/vedicConnection/images/arrow-down.png></a></div></div>'),
	//t.put("app/components/popup-properties/popupprop.html", '<div id=overlay ng-controller="PopupPropertiesController as vm"><form novalidate name=propForm ng-submit="propForm.$valid && vm.emailValidator() && vm.save()"><div class=row><div class=txt-cont><span class=lbl-inp>First Name:</span> <input type=text id=txt-firstname ng-class="{red:propForm.$submitted && propForm.firstname.$invalid}" name=firstname ng-model=vm.firstname required maxlength=50 class=modal-textbox placeholder=""></div></div><div class=row></div><div class=row><div class=txt-cont><span class=lbl-inp>Last Name:</span> <input type=text name=lastname id=txt-lastname ng-class="{red:propForm.$submitted && propForm.lastname.$invalid}" ng-model=vm.lastname required maxlength=50 class=modal-textbox placeholder=""></div></div><div class=row><div class=txt-cont><span class=lbl-inp>Title:</span> <input type=text name=title id=txt-title ng-model=vm.title ng-class="{red:propForm.$submitted && propForm.title.$invalid}" required maxlength=100 class=modal-textbox placeholder=""></div></div><div class=row><div class=txt-cont><span class=lbl-inp>Email:</span> <input type=email id=txt-email name=email ng-class="{red:propForm.$submitted && !vm.emailValidator()}" ng-model=vm.email required class=modal-textbox placeholder=""></div></div><div class=row><div class="col-lg-4 col-md-4 col-sm-4 radbtn-cont"><div class=select-header>Alignment:</div><div class=radio><label><input type=radio ng-model=vm.alignment.name value=Champion id=rd-champion name=optradio>Champion</label></div><div class=radio><label><input type=radio ng-model=vm.alignment.name value=Blocker id=rd-blocker name=optradio>Blocker</label></div><div class=radio><label><input type=radio ng-model=vm.alignment.name value=Neutral id=rd-neutral name=optradio>Neutral</label></div></div><div class="col-lg-4 col-md-4 col-sm-4 chk-cont"><div class=select-header>Role:</div><div class=checkbox><label><input type=checkbox ng-model=vm.economic id=chk-economic>Economic</label></div><div class=checkbox><label><input type=checkbox ng-model=vm.technical id=chk-technical>Technical</label></div><div class=checkbox><label><input type=checkbox ng-model=vm.competition id=chk-competition>Competitive</label></div><!--\n                <div class="checkbox">\n                    <md-checkbox md-no-ink aria-label="Checkbox No Ink" class="md-primary">\n                        Economic\n                    </md-checkbox>\n                </div>--></div><div class="col-lg-4 col-md-4 col-sm-4"><div class="row btn-cancel-cont"><button type=button id=btn-cancel ng-click=closeThisDialog() class=pop-btn>Cancel</button></div><div class=row><button type=submit class=pop-btn>Save</button></div></div></div></form></div>'),
	t.put("app/components/tabs/tabs.html", '<ul class="nav nav-tabs"><li ng-repeat="tab in tabs" ng-click=selectTab($index) ng-class="{selected: isSelectedTab($index)}"><div ng-bind=tab.title></div></li></ul><div ng-transclude></div>')
}]);
//# sourceMappingURL=../maps/scripts/app-1c7da64e5d.js.map
