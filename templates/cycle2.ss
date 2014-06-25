<%-- START OF SLIDESHOW --%>
<% if $Slides %>
    <div class="cycle-slideshow"
         data-cycle-timeout=4000
         data-cycle-next="#next1"
         data-cycle-prev="#prev1"
         data-cycle-fx="fade"
            >
        <% loop $Slides %>
            <img src="$Image.CroppedImage(551,380).URL" />
        <% end_loop %>
    </div>
    <% if $MoreThanOneSlide %>
        <div><a href="#" id="prev1"><span>Prev</span></a></div>
        <div><a href="#" id="next1"><span>Next</span></a></div>
    <% end_if %>
    <div><ul id="nav"></ul></div>
<% end_if %>
<%-- END OF SLIDESHOW --%>