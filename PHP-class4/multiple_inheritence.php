<?php
// Multiple Inheritance
trait CulturalInfo {
    public function showCulturalHeritage() {
        return "Rajshahi is famous for mangoes and silk.";
    }
}

trait EducationalInfo {
    public function showEducationDetails() {
        return "RUET is a leading engineering University in Rajshahi.";
    }
}

class RajshahiOverview {
    use CulturalInfo, EducationalInfo;

    public function showFullOverview() {
        return $this->showCulturalHeritage() . " " . $this->showEducationDetails();
    }
}

// Example Usage
$rajshahi = new RajshahiOverview();
echo $rajshahi->showFullOverview();
?>
