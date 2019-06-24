<div class="container">
    <div class="row">
    <% with $Media %>
        <div class="col-sm-12 <% if $Image %>col-md-9 order-md-9<% end_if %>">
            <h1><strong>$Title</strong></h1>
            <% if $NativeTitle || $Transliteration %><h4><% if $NativeTitle %><strong>$NativeTitle</strong> <% end_if %>$Transliteration</h4><% end_if %>
            <div class="five-star-rating" title="Rating: $Stars/100">
                <svg viewBox="0 0 125 25"><rect class="rating-bar" width="$Stars%" height="25"/><path class="rating-star" d="M-2-2v29h129V-2H-2z M120.2,25l-7.7-5.9l-7.7,5.9l3-9.6L100,9.6l-7.7,5.9l3,9.6l-7.7-5.9L79.8,25 l3-9.6L75,9.6l-7.7,5.9l3,9.6l-7.7-5.9L54.8,25l3-9.6L50,9.6l-7.7,5.9l3,9.6l-7.7-5.9L29.8,25l3-9.6L25,9.6l-7.7,5.9l3,9.6l-7.7-5.9 L4.8,25l3-9.6L0,9.6h9.6L12.5,0l2.9,9.6H25h9.6L37.5,0l2.9,9.6H50h9.6L62.5,0l2.9,9.6H75h9.6L87.5,0l2.9,9.6h9.6h9.6l2.9-9.6 l2.9,9.6h9.6l-7.7,5.9L120.2,25z"/></svg>
            </div>
            <% if $Summary %>
                <div class="summary">
                    <h4><strong>Summary</strong></h4>
                    <p>$Summary</p>
                </div>
            <% end_if %>
        </div>
        <% if $Image %>
        <div class="col-sm-12 col-md-3 order-md-3">
            <img class="img-fluid" alt="$Title" title="$Title" src="$Image.URL">
        
        </div>
        <% end_if %>
    <% end_with %>
    </div>
</div>


