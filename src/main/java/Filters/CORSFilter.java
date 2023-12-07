//package Filters;
//
//import jakarta.ws.rs.container.ContainerRequestContext;
//import jakarta.ws.rs.container.ContainerResponseContext;
//import jakarta.ws.rs.container.ContainerResponseFilter;
//
////import javax.ws.rs.container.ContainerResponseContext;
////import javax.ws.rs.container.ContainerResponseFilter;
//import javax.ws.rs.core.MultivaluedMap;
//import javax.ws.rs.ext.Provider;
//
//@Provider
//public class CORSFilter implements ContainerResponseFilter {
//
//    @Override
//    public void filter(ContainerRequestContext requestContext, ContainerResponseContext responseContext) {
//        MultivaluedMap<String, Object> headers = (MultivaluedMap<String, Object>) responseContext.getHeaders();
//        headers.add("Access-Control-Allow-Origin", "*");
//        headers.add("Access-Control-Allow-Methods", "GET, POST, DELETE, PUT");
//        headers.add("Access-Control-Allow-Headers", "X-Requested-With, Content-Type, X-Codingpedia");
//    }
//}