package models.entities;

import com.fasterxml.jackson.annotation.JsonIgnore;
import jakarta.persistence.*;

import java.util.*;

@Entity
@Table(name = "Options")
public class Options {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "OptionID")
    private int id;

    @Column(name = "Texte")
    private String texte;

    @Column(name = "EstVrai")
    private byte estVrai;

    @ManyToOne
    @JoinColumn(name = "QuestionID", referencedColumnName = "QuestionID")
    @JsonIgnore
    private Question question;

    @OneToMany(mappedBy = "options")
    @JsonIgnore
    private Set<Reponse> reponses;

    public Options() {
        reponses = new HashSet<>();
    }

    public Options(int id, String texte, byte estVrai) {
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

    public Question getQuestion() {
        return question;
    }

    public void setQuestion(Question question) {
        this.question = question;
    }

    public Set<Reponse> getReponses() {
        return reponses;
    }

    public void setReponses(Set<Reponse> reponses) {
        this.reponses = reponses;
    }

    @Override
    public String toString() {
        return "Options{" +
                "id=" + id +
                ", texte='" + texte + '\'' +
                ", estVrai=" + estVrai +
                '}';
    }
}
