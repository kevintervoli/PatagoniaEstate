<?php
    include './PHP/connect_to_database.php';
    $sql = "SELECT * FROM property INNER JOIN area ON property.Area_Id = area.Area_Id";
    $result  = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo ' 
        <li>
        <div class="property-card">

          <figure class="card-banner">

            <a href="#">
              <img src="'.$row['Image'].'" alt="Comfortable Apartment" class="w-100">
            </a>

            <div class="card-badge green">For Rent</div>

            <div class="banner-actions">

              <button class="banner-actions-btn">
                <ion-icon name="location"></ion-icon>

                <address>'.$row['Area_Name'].'</address>
              </button>

              <button class="banner-actions-btn">
                <ion-icon name="camera"></ion-icon>

                <span>4</span>
              </button>

              <button class="banner-actions-btn">
                <ion-icon name="film"></ion-icon>

                <span>2</span>
              </button>

            </div>

          </figure>

          <div class="card-content">

            <div class="card-price">
              <strong>'.$row['Price'].'</strong>$/Month
            </div>

            <h3 class="h3 card-title">
              <a href="#">'.$row['Property_Name'].'</a>
            </h3>

            <p class="card-text">
            '.$row['Description'].'
            </p>

            <ul class="card-list">

              <li class="card-item">
                <strong>'.$row['Nr_Bedrooms'].'</strong>

                <ion-icon name="bed-outline"></ion-icon>

                <span>Bedrooms</span>
              </li>

              <li class="card-item">
                <strong>'.$row['Nr_Bathrooms'].'</strong>

                <ion-icon name="man-outline"></ion-icon>

                <span>Bathrooms</span>
              </li>

              <li class="card-item">
                <strong>'.$row['Area'].'</strong>

                <ion-icon name="square-outline"></ion-icon>

                <span>Square Ft</span>
              </li>

            </ul>

          </div>

          <div class="card-footer">

            <div class="card-author">

              <figure class="author-avatar">
                <img src="./assets/images/agent.png" alt="Agent" class="w-100">
              </figure>

              <div>
                <p class="author-name">
                  <a href="#">Agent</a>
                </p>

                <p class="author-title">Estate Agents</p>
              </div>

            </div>

            <div class="card-footer-actions">

              <button class="card-footer-actions-btn">
                <ion-icon name="resize-outline"></ion-icon>
              </button>

              <button class="card-footer-actions-btn">
                <ion-icon name="heart-outline"></ion-icon>
              </button>

              <button class="card-footer-actions-btn">
                <ion-icon name="add-circle-outline"></ion-icon>
              </button>
              <form method="post" action="./view-php/login.php">
            </div>
            <button class="btn btn-primary btn-block">Buy</button>
          </div>
          </form>

        </div>
      </li>';
    }
