<?php
class premiumModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getPremium($id)
    {
        $q = "select premium.active_state as active from premium WHERE premium.teacher_id=?";
        $result = $this->prepare($q);
        $result->bind_param('i', $id);
        return $this->fetchOneObj($result, true);
    }

    public function teacherCount($id)
    {
        $q = "select count(classes_has_extra_teachers.teacher_id) as teacher_count from classes_has_extra_teachers where classes_has_extra_teachers.class_id=?";
        $result = $this->prepare($q);
        $result->bind_param('i', $id);
        return $this->fetchOneObj($result, true);
    }

    public function studentCount($id)
    {
        $q = "select count(classes_has_students.student_id) as student_count from classes_has_students where classes_has_students.class_id=?";
        $result = $this->prepare($q);
        $result->bind_param('i', $id);
        return $this->fetchOneObj($result, true);
    }

    public function classCount($id)
    {
        $q = "select count(teacher_has_class.class_id) as class_count from teacher_has_class where teacher_has_class.teacher_id=?";
        $result = $this->prepare($q);
        $result->bind_param('i', $id);
        return $this->fetchOneObj($result, true);
    }

    public function getExpireTime($id)
    {
        $query = "SELECT expire_timestamp FROM premium WHERE teacher_id = ? and active_state=1";
        $stmt = $this->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['expire_timestamp'];
        } else {
            return null;
        }
    }

    public function backToFree($id)
    {
        $stmt = $this->prepare("UPDATE premium SET active_state= 0 WHERE teacher_id = ?");
        $stmt->bind_param('i',$id);
        $res = $this->executePrepared($stmt);
        return $res;
    }

    public function savePayment($payID, $userID, $currency, $amount ,$description , $method,$classId){
        $stmt1 = $this->prepare("INSERT INTO payment(paymentId,userId,currency,amount,type,method) VALUES (?,?,?,?,?,?)");
        $stmt1->bind_param("iisdss",$payID,$userID,$currency,$amount,$description,$method);
        
        $stmt2 = $this->prepare("INSERT INTO premium(teacher_id,buy_timestamp,expire_timestamp,active_state) 
        VALUES (?, NOW(), DATE_ADD(NOW(), INTERVAL 1 YEAR) , 1);");
        $stmt2->bind_param('ii',$userID);

        return $this->executePrepared($stmt1) and $this->executePrepared($stmt2);
    }

}
