$(document).ready((function(){$.ajaxSetup({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")}}),$("#save-info").on("click",(function(e){e.preventDefault();var s=$("#info-form").serialize();$.ajax({type:"POST",url:"/admin/site_settings/info/1",data:s,success:function(e){var s=JSON.parse(e);s.success?swal({title:s.message,icon:"success"}).then((()=>{location.reload()})):swal({title:s.message,icon:"error"})}})})),$("#social-submit").on("click",(function(e){e.preventDefault();var s=$("#social-form").serialize();$.ajax({type:"POST",url:"/admin/site_settings/social/1",data:s,success:function(e){var s=JSON.parse(e);s.success?swal({title:s.message,icon:"success"}).then((()=>{location.reload()})):swal({title:s.message,icon:"error"})}})})),$("#basic-submit").on("click",(function(e){e.preventDefault();var s=$("#basic-form").serialize();$.ajax({type:"POST",url:"/admin/site_settings/basic/1",data:s,success:function(e){var s=JSON.parse(e);s.success?swal({title:s.message,icon:"success"}).then((()=>{location.reload()})):swal({title:s.message,icon:"error"})}})}))}));
