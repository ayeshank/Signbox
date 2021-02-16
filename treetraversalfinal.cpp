#include <iostream> 
using namespace std; 
struct Node 
{ 
    int data; 
    struct Node* left, *right; 
    Node(int data) 
    { 
        this->data = data; 
        left = right = NULL; 
    } 
}; 
void Inorder(struct Node* node) 
{ 
    if (node == NULL) 
        return; 
    Inorder(node->left); 
    cout << node->data << " "; 
    Inorder(node->right); 
} 
void Preorder(struct Node* node) 
{ 
    if (node == NULL) 
        return; 
    cout << node->data << " "; 
    Preorder(node->left);  
    Preorder(node->right); 
}  
void Postorder(struct Node* node) 
{ 
    if (node == NULL) 
        return; 
    Postorder(node->left); 
    Postorder(node->right); 
    cout << node->data << " "; 
} 
int main() 
{ 
    struct Node *root  = new Node(1); 
    root->left         = new Node(2); 
    root->right        = new Node(3); 
    root->left->left   = new Node(4); 
    root->left->right  = new Node(5);
    root->right->left  = new Node(6);
    root->right->right = new Node(7);
    cout << "\nInorder traversal : "; Inorder(root);  
    cout << "\nPreorder traversal : "; Preorder(root); 
    cout << "\nPostorder traversal : "; Postorder(root); 
    return 0; 
} 