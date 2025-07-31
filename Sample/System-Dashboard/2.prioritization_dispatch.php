<?php
$conn = new mysqli("localhost", "root", "", "emergency_system");
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $incident_id = $_POST['incident_id'];
    $priority = $_POST['priority_level'];
    $unit = $_POST['dispatched_unit'];
    $stmt = $conn->prepare("INSERT INTO dispatch (incident_id, priority_level, dispatched_unit) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $incident_id, $priority, $unit); $stmt->execute(); $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="css/style1.css">
	<link rel="stylesheet" href="css/viewprofile.css">
	<title>LGU4</title>
	
	<style>
		/* Dropdown styles for Emergency Response System */
		.emergency-dropdown {
			position: relative;
			z-index: 2000;
		}
		
		.emergency-submenu {
	display: none;
	padding: 10px 0;
	background: var(--blackblue); /* or #1a1a2e */
	box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
	animation: slideDown 0.3s ease-out;
	position: relative;

	/* Scroll but hidden scrollbar */
	max-height: 280px;
	overflow-y: auto;
	scrollbar-width: none; /* Firefox */
	-ms-overflow-style: none; /* IE and Edge */
}

		.emergency-submenu::-webkit-scrollbar {
	display: none; /* Chrome, Safari */
}
.emergency-submenu::-webkit-scrollbar-thumb {
	background: #888;
	border-radius: 5px;
}
		
		.emergency-submenu.show {
			display: block;
		}
		
		@keyframes slideDown {
			from {
				opacity: 0;
				transform: translateY(-10px);
			}
			to {
				opacity: 1;
				transform: translateY(0);
			}
		}
		
		.emergency-submenu li {
			list-style: none;
		}
		
		.emergency-submenu a {
			display: flex;
			align-items: center;
			padding: 8px 20px;
			color: #fff;
			text-decoration: none;
			font-size: 14px;
			transition: all 0.3s ease;
			border-left: 3px solid transparent;
		}
		
		.emergency-submenu a:hover {
			background: rgba(255, 255, 255, 0.1);
			border-left: 3px solid #fff;
			transform: translateX(5px);
		}
		
		.emergency-submenu i {
			margin-right: 10px;
			font-size: 16px;
		}
		
		.emergency-main-link {
			position: relative;
		}
		
		.emergency-main-link::after {
			content: '\ea5e'; /* boxicon chevron-down */
			font-family: 'boxicons';
			position: absolute;
			right: 15px;
			transition: transform 0.3s ease;
		}
		
		.emergency-main-link.active::after {
			transform: rotate(180deg);
		}
	</style>
</head>
<body>
	<div id="avatarModal" class="modal">
		<span class="close">&times;</span>
		<img class="modal-content" id="modalImage">
	</div>
	<section id="sidebar">
		<a href="#" class="brand">
			<img src="img/logo2.png" alt="Profile Photo" class="profile-avatar" id="profileAvatar" style="cursor: pointer; transition: transform 0.2s;">
			<span class="text">Public Safety And Security</span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="index.html">
					<i class='bx bxs-dashboard'></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<span class="separator">Main</span>
			<li>
				<a href="#">
					<i class='bx bx-shield'></i>
					<span class="text">Law Enforcement and Incident Reporting</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx  bx-car'  ></i> 
					<span class="text">Traffic and Transport Management</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx  bx-flame'></i> 
					<span class="text">Fire and Rescue Services Management</span>
				</a>
			</li>





			<li class="emergency-dropdown">
				<a href="index.html" class="emergency-main-link" id="emergencyToggle">
					<i class='bx  bx-bell'  ></i> 
					<span class="text">Emergency Response System</span>
				</a>

				<ul class="emergency-submenu" id="emergencySubmenu">
					<li>
						<a href="1.receiving_logging.php">
							<i class='bx bx-phone-call'></i>
							<span>Receiving and Logging</span>
						</a>
					</li>
					<li>
						<a href="#">
							<i class='bx bx-map-pin'></i>
							<span>Prioritization and Dispatch</span>
						</a>
					</li>
					<li>
						<a href="3.resource_allocation.php">
							<i class='bx bx-first-aid'></i>
							<span>Resource Allocation (EMS, Fire, Police)</span>
						</a>
					</li>
					<li>
						<a href="4.response_analytics.php">
							<i class='bx bx-shield-alt-2'></i>
							<span>Response Time Analytics</span>
						</a>
					</li>
					<li>
						<a href="5.coordination_portal.php">
							<i class='bx bx-radio'></i>
							<span>Inter-agency Coordination Portal</span>
						</a>
					</li>
					<li>
						<a href="6.review_feedback.php">
							<i class='bx bx-group'></i>
							<span>Review and Feedback</span>
						</a>
					</li>
					<li>
						<a href="7.gps_tracking.php">
							<i class='bx bx-time-five'></i>
							<span>Response Time Tracking</span>
						</a>
					</li>
				</ul>
			</li>





			<li>
				<a href="#">
					<i class='bx  bx-user'  ></i> 
					<span class="text">Community Policing and Surveillance</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx  bx-bar-chart-big'  ></i> 
					<span class="text">Crime Data Analytics and Reporting</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx  bx-megaphone-alt'  ></i> 
					<span class="text">Public Safety Campaign Management</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx  bx-heart-plus'  ></i> 
					<span class="text">Health and Safety Inspections</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx  bx-book-open'  ></i> 
					<span class="text">Disaster Preparedness Training and Simulation</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx  bx-message'  ></i> 
					<span class="text">Emergency Communication System</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<span class="separator">SETTINGS</span>
			<li>
				<a href="Profile.html">
					<i class='bx bxs-user-pin'></i>
					<span class="text">Profile</span>
				</a>
			</li>
			<li>
				<a href="Settings.html">
					<i class='bx bxs-cog'></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="#" class="logout">
					<i class='bx bxs-log-out-circle'></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<section id="content">
		<nav>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
				</div>
			</form>
			<a href="#" class="notification">
				<i class='bx bxs-bell'></i>
				<span class="num">9+</span>
			</a>
			<div class="profile-dropdown">
				<a href="#" class="profile" id="profile-btn">
					<img src="img/rei.jpg">
				</a>
				<div class="dropdown-menu" id="dropdown-menu">
					<a href="Profile.html">Profile</a>
					<a href="Settings.html">Settings</a>
				</div>
			</div>
		</nav>

		
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
			</div>
			


			<div class="dashboard-overview">

<h2>Incident Dispatch</h2>
<form method="POST">
    <select class="form-control mb-2" name="incident_id" required>
        <option disabled selected>Select Incident</option>
        <?php
        $result = $conn->query("SELECT id, name FROM incidents");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['id']}'>[{$row['id']}] {$row['name']}</option>";
        } ?>
    </select>
    <select class="form-control mb-2" name="priority_level" required>
        <option>Low</option><option selected>Medium</option><option>High</option>
    </select>
    <input type="text" class="form-control mb-2" name="dispatched_unit" placeholder="Unit Name" required>
    <button class="btn btn-success">Dispatch</button>
</form>
<hr>
<h4>Dispatch Records</h4>
<table class="table table-bordered"><tr><th>ID</th><th>Incident</th><th>Priority</th><th>Unit</th><th>Time</th></tr>
<?php
$result = $conn->query("SELECT d.*, i.name FROM dispatch d JOIN incidents i ON d.incident_id = i.id ORDER BY d.id DESC");
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['priority_level']}</td><td>{$row['dispatched_unit']}</td><td>{$row['dispatch_time']}</td></tr>";
} ?>
</table>

</div>
</main>


<script src="script.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	
	<script>
		// Emergency Response System Dropdown Toggle
		document.getElementById("emergencyToggle").addEventListener("click", function(event) {
			event.preventDefault();
			const submenu = document.getElementById("emergencySubmenu");
			const mainLink = document.getElementById("emergencyToggle");
			
			submenu.classList.toggle("show");
			mainLink.classList.toggle("active");
		});
		
		// Profile dropdown functionality
		document.getElementById("profile-btn").addEventListener("click", function(event) {
			event.preventDefault();
			document.getElementById("dropdown-menu").classList.toggle("show");
		});
		document.addEventListener("click", function(event) {
			if (!document.getElementById("profile-btn").contains(event.target)) {
				document.getElementById("dropdown-menu").classList.remove("show");
			}
		});
	</script>

	<script>
		var modal = document.getElementById("avatarModal");
		var img = document.getElementById("profileAvatar");
		var modalImg = document.getElementById("modalImage");
		img.onclick = function(){
			modal.style.display = "block";
			modalImg.src = this.src;
		}
		var span = document.getElementsByClassName("close")[0];
		span.onclick = function() {
			modal.style.display = "none";
		}
		modal.onclick = function(event) {
			if (event.target === modal) {
				modal.style.display = "none";
			}
		}
	</script>

	<script>
		document.getElementById('profileAvatar').addEventListener('click', function() {
			this.style.transform = 'scale(0.95)';
			setTimeout(() => {
				this.style.transform = 'scale(1)';
			}, 200);
			console.log("Image clicked!");
		});
	</script>
	
	<script>
		
		const trendCtx = document.getElementById('trendChart').getContext('2d');
		const trendChart = new Chart(trendCtx, {
			type: 'line',
			data: {
				labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
				datasets: [{
					label: 'Incidents',
					data: [35, 42, 28, 45, 38, 52, 47],
					borderColor: 'rgb(75, 192, 192)',
					tension: 0.1,
					fill: false
				}]
			},
			options: {
				responsive: true,
				scales: {
					y: {
						beginAtZero: true,
						max: 60,
						ticks: {
							stepSize: 15
						}
					}
				}
			}
		});

		
		const crimeCtx = document.getElementById('crimeChart').getContext('2d');
		const crimeChart = new Chart(crimeCtx, {
			type: 'pie',
			data: {
				labels: ['Theft', 'Assault', 'Vandalism', 'Traffic Violations', 'Other'],
				datasets: [{
					data: [25, 15, 10, 30, 20],
					backgroundColor: [
						'rgba(255, 99, 132, 0.7)',
						'rgba(54, 162, 235, 0.7)',
						'rgba(255, 206, 86, 0.7)',
						'rgba(75, 192, 192, 0.7)',
						'rgba(153, 102, 255, 0.7)'
					],
					borderWidth: 1
				}]
			},
			options: {
				responsive: true,
				plugins: {
					legend: {
						position: 'right'
					}
				}
			}
		});

		
		const responseCtx = document.getElementById('responseChart').getContext('2d');
		const responseChart = new Chart(responseCtx, {
			type: 'bar',
			data: {
				labels: ['Current'],
				datasets: [{
					label: 'Minutes',
					data: [12],
					backgroundColor: 'rgba(54, 162, 235, 0.7)'
				}]
			},
			options: {
				responsive: true,
				scales: {
					y: {
						beginAtZero: true,
						max: 15
					}
				}
			}
		});
	</script>

	
</body>
</html>