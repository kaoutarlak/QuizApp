package com.example.quizsystem;

//import Filters.CORSFilter;
import jakarta.ws.rs.ApplicationPath;
import jakarta.ws.rs.core.Application;


import java.util.HashSet;
import java.util.Set;

@ApplicationPath("/api")

public class HelloApplication extends Application {

 //   @Override
//    public Set<Class<?>> getClasses() {
//        Set<Class<?>> resources = new HashSet<>();
//        resources.add(CORSFilter.class);
//        resources.add(QuizResource.class);
//        return resources;
//    }
}