<?php
	class DBConnect {

		public function __construct() {
			setlocale(LC_TIME, 'ru_RU');
			$this->mysqli = new mysqli($this->host, $this->user, $this->pass, $this->name);
			if ($this->mysqli->connect_errno) {
				echo "Не удалось подключиться к MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
			}
		}

		protected $user = 'a0000600_curse';
		protected $pass = 'P4HkfFxX';
		protected $name = 'a0000600_curse';
		protected $host = 'localhost';

		public $mysqli;

		public function getEmployees() {
			$result = $this->mysqli->prepare("SELECT * FROM employees");
			
			$result->execute();
			$query = $result->get_result();
			while ($data = $query->fetch_assoc()) {
				$sum[] = $data;
			}
			$result->close();
			return $sum;
		}

		public function getEmployee($id) {
			$result = $this->mysqli->prepare("SELECT * FROM employees WHERE id=?");

			$id = (int)$id;
			$result->bind_param('d', $id);
			$result->execute();
			$query = $result->get_result();
			while ($data = $query->fetch_assoc()) {
				$sum[] = $data;
			}
			$result->close();
			if(!empty($sum)) {
				return $sum[0];
			} else {
				return false;
			}
			
		}

		public function getLastEdit($id) {
			$id = (int)$id;
			$result = $this->mysqli->prepare("SELECT * FROM history WHERE employee_id = ?");
			$result->bind_param('d', $id);
			
			$result->execute();
			$query = $result->get_result();
			if (!is_null($query)) {
				while ($data = $query->fetch_assoc()) {
					$sum[] = $data;
				}
			} else {
				return false;
			}
			
			return $sum[0];
		}

		public function search($data) {

			$data = '%'.$data.'%';
			$data = mysqli_real_escape_string($this->mysqli, $data);
			$result = $this->mysqli->prepare("SELECT * FROM employees WHERE name LIKE ? OR job LIKE ? OR phone LIKE ? OR email LIKE ?");
			$result->bind_param('ssss', $data, $data, $data, $data);
			
			$result->execute();
			$query = $result->get_result();
			if (!is_null($query)) {
				while ($data = $query->fetch_assoc()) {
					$sum[] = $data;
				}
			} else {
				return false;
			}
			
			return $sum;
		}

		public function setHistory($IP, $employee_id, $date) {
			$result = $this->mysqli->prepare("INSERT INTO history (IP, date, employee_id) VALUES (?, ?, ?)");
			$result->bind_param('sdd', $IP, $employee_id, $date);
			
			$result->execute();
			
			return $result;
		}

		public function getHistory($id) {
			$id = (int)$id;
			$result = $this->mysqli->prepare("SELECT * FROM history WHERE employee_id = ? ORDER BY date DESC");
			$result->bind_param('d', $id);
			
			$result->execute();
			$query = $result->get_result();
			if (!is_null($query)) {
				while ($data = $query->fetch_assoc()) {
					$sum[] = $data;
				}
			} else {
				return false;
			}
			
			return $sum;
		}
		
		public function add($name, $job, $phone, $mail) {
			$result = $this->mysqli->prepare("INSERT INTO employees (name, job, phone, email) VALUES (?, ?, ?, ?)");
			$result->bind_param('ssss', $name, $job, $phone, $mail);
			
			$result->execute();
			
			return $result;
		}

		public function update($id, $name, $job, $phone, $mail) {
			$id = (int)$id;
			$result = $this->mysqli->prepare("UPDATE employees SET name = ?, job = ? , phone = ?, email = ? WHERE id = ?");
			$result->bind_param('ssssd', $name, $job, $phone, $mail, $id);
			
			$result->execute();
			
			return $result;
		}

		public function delete($id) {
			$id = (int)$id;
			$result = $this->mysqli->prepare("DELETE FROM employees WHERE id = ?");
			$result->bind_param('d', $id);
			
			$result->execute();
			
			return $result;
		}
	}

	$dbc = new DBConnect();
?>