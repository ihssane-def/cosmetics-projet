<?php
class Produit {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function ajouterProduit($libelle, $prix, $id_categorie, $image) {
        $query = "INSERT INTO produit (libelle, prix, id_categorie, image) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->conn->prepare($query);
        if (!$stmt) {
    die('Erreur de préparation de la requête : ' . $this->db->conn->error);
}
        $stmt->bind_param("ssss", $libelle, $prix, $id_categorie, $image);

        return $stmt->execute();
    }

    public function listerProduits() {
        $query = "SELECT produit.id, produit.libelle, produit.prix, categorie.nom_categorie
        FROM produit
        JOIN categorie ON produit.id_categorie = categorie.id";
        $result = $this->db->conn->query($query);

        $produits = array();
        while ($row = $result->fetch_assoc()) {
            $produits[] = $row;
        }

        return $produits;
    }

    public function obtenirProduitParId($id) {
        $query = "SELECT * FROM produit WHERE id = ?";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $produit = $result->fetch_assoc();

        return $produit;
    }

    public function modifierProduit($id, $libelle, $prix, $id_categorie) {
        $query = "UPDATE produit SET libelle=?, prix=?, id_categorie=? WHERE id=?";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bind_param("sssi", $libelle, $prix, $id_categorie, $id);

        return $stmt->execute();
    }

    public function supprimerProduit($id) {
        $query = "DELETE FROM produit WHERE id = ?";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }
    public function listerCategories() {
        $query = "SELECT * FROM categorie";
        $result = $this->db->conn->query($query);
    
        $categories = array();
        while ($row = $result->fetch_assoc()) {
            $categories[] = $row;
        }
    
        return $categories;
    }

    public function listerProduitsParCategorie($id_categorie) {
        $query = "SELECT produit.id, produit.libelle, produit.prix, categorie.nom_categorie
        FROM produit
        JOIN categorie ON produit.id_categorie = categorie.id
        WHERE produit.id_categorie = ?";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bind_param("i", $id_categorie);
        $stmt->execute();

        $result = $stmt->get_result();
        $produits = array();
        while ($row = $result->fetch_assoc()) {
            $produits[] = $row;
        }

        return $produits;
    }

    
}
?>
