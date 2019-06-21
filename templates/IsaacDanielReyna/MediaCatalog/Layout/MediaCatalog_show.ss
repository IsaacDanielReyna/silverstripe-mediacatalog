<div class="container">
    <div class="row">
        <div class="col">
            <% with $Media %>
            <div class="media">
                    $Image
                    <div class="media-body">
                            
                        <h5 class="mt-0">$Title</h5>
                        <div class="rating-container" title="$Stars/100">
                            <div class="rating-percentage" style="width:$Stars%;"></div>
                            <svg id="star" viewBox="0 0 24 24"><path d="M0,0V24H24V0ZM19.37,23.93,12,18.29,4.63,23.93l2.82-9.12L.07,9.19H9.19L12,.07l2.81,9.12h9.12l-7.38,5.62Z"/></svg>
                            <svg id="star" viewBox="0 0 24 24"><path d="M0,0V24H24V0ZM19.37,23.93,12,18.29,4.63,23.93l2.82-9.12L.07,9.19H9.19L12,.07l2.81,9.12h9.12l-7.38,5.62Z"/></svg>
                            <svg id="star" viewBox="0 0 24 24"><path d="M0,0V24H24V0ZM19.37,23.93,12,18.29,4.63,23.93l2.82-9.12L.07,9.19H9.19L12,.07l2.81,9.12h9.12l-7.38,5.62Z"/></svg>
                            <svg id="star" viewBox="0 0 24 24"><path d="M0,0V24H24V0ZM19.37,23.93,12,18.29,4.63,23.93l2.82-9.12L.07,9.19H9.19L12,.07l2.81,9.12h9.12l-7.38,5.62Z"/></svg>
                            <svg id="star" viewBox="0 0 24 24"><path d="M0,0V24H24V0ZM19.37,23.93,12,18.29,4.63,23.93l2.82-9.12L.07,9.19H9.19L12,.07l2.81,9.12h9.12l-7.38,5.62Z"/></svg>
                        </div>
                        <p><strong>$NativeTitle</strong> $Transliteration</p>
                        $Description
                    </div>
                </div>
            <% end_with %>
        </div>
    </div>
</div>


