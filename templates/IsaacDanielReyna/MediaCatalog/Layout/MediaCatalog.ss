<div class="container">
    <% if $Content %>
    <div class="row">
        <div class="col">
            $Content
        </div>
    </div>
    <% end_if %>

    <div class="row">
        <div id="posters" class="col-sm-12 text-center">
        <% loop $Media %>
            <div class="poster">
                <a title="Learn more about $Title" href="$Link">
                    <div class="title">$Title</div>
                    <div class="five-star-rating">
                        <svg viewBox="0 0 125 25"><rect class="rating-bar" width="$Stars%" height="25"/><path class="rating-star" d="M-2-2v29h129V-2H-2z M120.2,25l-7.7-5.9l-7.7,5.9l3-9.6L100,9.6l-7.7,5.9l3,9.6l-7.7-5.9L79.8,25 l3-9.6L75,9.6l-7.7,5.9l3,9.6l-7.7-5.9L54.8,25l3-9.6L50,9.6l-7.7,5.9l3,9.6l-7.7-5.9L29.8,25l3-9.6L25,9.6l-7.7,5.9l3,9.6l-7.7-5.9 L4.8,25l3-9.6L0,9.6h9.6L12.5,0l2.9,9.6H25h9.6L37.5,0l2.9,9.6H50h9.6L62.5,0l2.9,9.6H75h9.6L87.5,0l2.9,9.6h9.6h9.6l2.9-9.6 l2.9,9.6h9.6l-7.7,5.9L120.2,25z"/></svg>
                    </div>
                    <% if $Image %><img  alt="$Title" src="$Image.Pad(200,300, #000).URL"><% end_if %>
                </a>
            </div>
        <% end_loop %>
        </div>
    </div>
</div>