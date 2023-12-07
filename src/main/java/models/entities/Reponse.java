package models.entities;

import com.fasterxml.jackson.annotation.JsonIgnore;
import jakarta.persistence.*;

@Entity
@Table(name = "Reponse")
public class Reponse {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "ReponseID")
    private int id;

    @Column(name = "Texte")
    private String texte;

    @Column(name = "EstVrai")
    private byte estVrai;

    @ManyToOne
    @JoinColumn(name = "OptionID", referencedColumnName = "OptionID")
    @JsonIgnore
    private Options options;

    @ManyToOne
    @JoinColumn(name = "QuizID", referencedColumnName = "QuizID")
    @JsonIgnore
    private Quiz quiz;

    public Reponse() {
    }

    public Reponse(int id, String texte, byte estVrai) {
        this.id = id;
        this.texte = texte;
        this.estVrai = estVrai;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getTexte() {
        return texte;
    }

    public void setTexte(String texte) {
        this.texte = texte;
    }

    public byte getEstVrai() {
        return estVrai;
    }

    public void setEstVrai(byte estVrai) {
        this.estVrai = estVrai;
    }

    public Options getOptions() {
        return options;
    }

    public void setOptions(Options options) {
        this.options = options;
    }

    public Quiz getQuiz() {
        return quiz;
    }

    public void setQuiz(Quiz quiz) {
        this.quiz = quiz;
    }

    @Override
    public String toString() {
        return "Reponse{" +
                "id=" + id +
                ", texte='" + texte + '\'' +
                ", estVrai=" + estVrai +
                '}';
    }
}
