<?php
session_start();
if(isset($_SESSION['name'])){
include "db_conn.php"; // Include your database connection file
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manageur d'etudiants</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap4.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="style.css">

  <!-- Inline Styles for Modal -->
  <style>
    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
      background-color: #fefefe;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      max-width: 600px;
      position: relative;
    }

    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
      cursor: pointer;
    }

    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
    }
  </style>
</head>

<body>
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-hand-holding-usd"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Bourssi</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="Acceil.php">
          <i class="fas fa-house-user"></i>
          <span>Acceil</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Modification et Deconnection
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item active">
        <a class="nav-link" href="Etudiants.php">
          <i class='fas fa-user-graduate'></i>
          <span>Etudiants</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Etudiants_a.php">
          <i style="color: green;" class='fas fa-user-graduate'></i>
          <span>Etudiants Accepter</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Etudiants_r.php">
          <i style="color:red" class='fas fa-user-graduate'></i>
          <span>Etudiants Refusee</span></a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="charts.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="deconnexion.php">
          <i class="fas fa-door-open"></i>
          <span>Deconnexion</span></a>
      </li>

      <!-- Divider -->
      <!-- <hr class="sidebar-divider"> -->

      <!-- Heading -->
      <!-- <div class="sidebar-heading">
        Problem ?
      </div> -->

      <!-- Nav Item - Charts -->
      

      <!-- Divider -->
      <!-- <hr class="sidebar-divider d-none d-md-block"> -->

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <div class="container">
          <?php
          if (isset($_GET["msg"])) {
            $msg = $_GET["msg"];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                  ' . $msg . '
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
          }
          ?>
          
          <table class="table table-hover text-center" id="Crud">
            <thead class="table-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Photo</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Email</th>
                <th scope="col">Tel</th>
                <th scope="col">Carte d'identite</th>
                <th scope="col">Atestation</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = "SELECT * FROM `e_accepte`";
              $result = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_assoc($result)) {
              ?>
                <tr>
                  <td><?php echo $row["id"] ?></td>
                  <td><img src="../Etudiants/images/<?php echo $row["Photo"] ?>" alt="" width="50px"></td>
                  <td><?php echo $row["Nom"] ?></td>
                  <td><?php echo $row["Prenom"] ?></td>
                  <td><?php echo $row["Email"] ?></td>
                  <td><?php echo $row["Tel"] ?></td>
                  <td><?php echo $row["Carte"] ?></td>
                  <td><a href="../Etudiants/atestations/<?php echo $row["Attestation"] ?>" target="_blank"><i style="color:blue" class="fa-solid fa-eye fs-5"></i></a></td>
                  <td>
                    <button onclick="openModal(
                      '<?php echo $row["id"] ?>',
                      '<?php echo $row["Nom"] . ' ' . $row["Prenom"] ?>',
                      '<?php echo $row["Photo"] ?>',
                      '<?php echo $row["NNI"] ?>',
                      '<?php echo $row["Specialite"] ?>',
                      '<?php echo $row["Demande"] ?>',
                      '<?php echo $row["Attestation"] ?>'
                      )" style="border:none;margin: 3px;"><i style="color:blue" class="fas fa-id-card fs-5"></i></button>
                      <form action="ehhr.php" method="post" style="display:inline;">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="hidden" name="Nom" value="<?php echo $row['Nom']; ?>">
        <input type="hidden" name="Prenom" value="<?php echo $row['Prenom']; ?>">
        <input type="hidden" name="Email" value="<?php echo $row['Email']; ?>">
        <input type="hidden" name="Matricule" value="<?php echo $row['Matricule']; ?>">
        <input type="hidden" name="NNI" value="<?php echo $row['NNI']; ?>">
        <input type="hidden" name="Specialite" value="<?php echo $row['Specialite']; ?>">
        <input type="hidden" name="Specialite" value="<?php echo $row['Demande']; ?>">
        <input type="hidden" name="Atestation" value="<?php echo $row['Attestation']; ?>">
        <input type="hidden" name="Photo" value="<?php echo $row['Photo']; ?>">
        <button name="sub" type="submit" style="border:none;margin: 3px; background: none;"><i style="color:red" class="fa-solid fa-user-graduate fs-5"></i></button>
    </form>
                      
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div id="myModal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="closeModal()">&times;</span>
      <div id="modalContent"></div>
    </div>
  </div>

  <!-- Bootstrap JS and other scripts -->
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap4.js"></script>

  <script>
    $(document).ready(function() {
      $('#Crud').DataTable();
    });

    function openModal(id, nomPrenom, photo, nni,  departement,demande, attestation) {
      document.getElementById('myModal').style.display = 'block';
      document.getElementById('modalContent').innerHTML = `
        <h2>${nomPrenom}</h2>
        <img src="../Etudiants/images/${photo}" alt="" width="100px">
        <p>ID: ${id}</p>
        <p>NNI: ${nni}</p>
        <p>Département: ${departement}</p>
        <p>Démande: ${demande}</p>
        <p>Attestation: <a href="../Etudiants/atestations/${attestation}" target="_blank">Voir Attestation</a></p>
      `;
    }

    function closeModal() {
      document.getElementById('myModal').style.display = 'none';
    }
  </script>

</body>

</html>

<?php
}
else{
  header("location:login.php");
}
?>