<div data-url="demo-page" data-role="page" id="demo-page">
    <div data-role="header">
        <h1>Bikes</h1>
        <a href="#left-panel" data-icon="bars" data-iconpos="notext" data-shadow="false" data-iconshadow="false">Menu</a>
    </div><!-- /header -->
    <div role="main" class="ui-content">
        <div class="article">
            <p><img src="../_assets/img/bike.jpg" alt="Fixed Gear bike"></p>
            <h2>Fixed Gear</h2>
            <p>A fixed-gear or fixed-wheel bicycle, commonly known as a fixie, is a bicycle that has a drivetrain with no freewheel mechanism. The freewheel was developed early in the history of bicycle design but the fixed-gear bicycle remained the standard track racing design. More recently the 'fixie' has become a popular alternative among mainly urban cyclists, offering the advantages of simplicity compared with the standard multi-geared bicycle.</p>
            <p><small>Source: Wikipedia</small></p>
            <p><a href="#right-panel" class="ui-btn ui-shadow ui-corner-all ui-btn-inline ui-mini">Share</a></p>
        </div><!-- /article -->
    </div><!-- /content -->
    <div data-role="panel" id="left-panel">
        <ul data-role="listview">
            <li data-icon="delete"><a href="#" data-rel="close">Close</a></li>
            <li data-icon="back"><a href="#demo-intro" data-rel="back">Demo intro</a></li>
            <li data-role="list-divider">Categories</li>
            <li data-role="collapsible" data-inset="false" data-iconpos="right">
              <h3>Bikes</h3>
              <ul data-role="listview">
                <li><a href="#">Road</a></li>
                <li><a href="#">ATB</a></li>
                <li><a href="#">Fixed Gear</a></li>
                <li><a href="#">Cruiser</a></li>
              </ul>
            </li><!-- /collapsible -->
            <li data-role="collapsible" data-inset="false" data-iconpos="right">
              <h3>Cars</h3>
              <ul data-role="listview">
                <li><a href="#">SUV</a></li>
                <li><a href="#">Sport</a></li>
                <li><a href="#">Convertible</a></li>
              </ul>
            </li><!-- /collapsible -->
            <li data-role="collapsible" data-inset="false" data-iconpos="right">
              <h3>Boats</h3>
              <ul data-role="listview">
                <li><a href="#">Runabout</a></li>
                <li><a href="#">Motorboat</a></li>
                <li><a href="#">Sailboat</a></li>
              </ul>
            </li><!-- /collapsible -->
        </ul>
    </div><!-- /panel -->
    <div data-role="panel" id="right-panel" data-display="overlay" data-position="right">
        <ul data-role="listview" data-icon="false">
            <li data-icon="delete"><a href="#" data-rel="close">Close</a></li>
            <li data-role="list-divider">Share this page</li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Google +</a></li>
            <li><a href="#">Mail</a></li>
        </ul>
    </div><!-- /panel -->
</div>